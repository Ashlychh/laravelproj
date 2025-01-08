<?php 

namespace App\Http\Controllers;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class iclockController extends Controller
{

   public function __invoke(Request $request)
   {

   }

    // handshake
public function handshake(Request $request)
{
    $data = [
        'url' => json_encode($request->all()),
        'data' => $request->getContent(),
        'sn' => $request->input('SN'),
        'option' => $request->input('option'),
    ];
    DB::table('device_log')->insert($data);

    // update status device
    DB::table('devices')->updateOrInsert(
        ['no_sn' => $request->input('SN')],
        ['online' => now()]
    );

    $response = "GET OPTION FROM: {$request->input('SN')}\r\n" .
                "Stamp=9999\r\n" .
                "OpStamp=" . time() . "\r\n" .
                "ErrorDelay=60\r\n" .
                "Delay=30\r\n" .
                "ResLogDay=18250\r\n" .
                "ResLogDelCount=10000\r\n" .
                "ResLogCount=50000\r\n" .
                "TransTimes=00:00;14:05\r\n" .
                "TransInterval=1\r\n" .
                "TransFlag=1111000000\r\n" .
                "Realtime=1\r\n" .
                "Encrypt=0";

    return $response;
}

    // Implementation of https://docs.nufaza.com/docs/devices/zkteco_attendance/push_protocol/
    // Setting timezone
    // Receive attendance records
    public function receiveRecords(Request $request)
    {   
        $content['url'] = json_encode($request->all());
        $content['data'] = $request->getContent();
        DB::table('finger_log')->insert($content);
        
        try {
            $arr = preg_split('/\\r\\n|\\r|,|\\n/', $request->getContent());
            $total = 0;

            // Operation log
            if ($request->input('table') == "OPERLOG") {
                foreach ($arr as $entry) {
                    if (isset($entry)) {
                        $total++;
                    }
                }
                return "OK: " . $total;
            }

            // Attendance log
            foreach ($arr as $entry) {
                if (empty($entry)) {
                    continue;
                }

                $data = explode("\t", $entry);

                $record = [
                    'sn' => $request->input('SN'),
                    'table' => $request->input('table'),
                    'stamp' => $request->input('Stamp'),
                    'employee_id' => $data[0],
                    'timestamp' => $data[1],
                    'status1' => $this->validateAndFormatInteger($data[2] ?? null),
                    'status2' => $this->validateAndFormatInteger($data[3] ?? null),
                    'status3' => $this->validateAndFormatInteger($data[4] ?? null),
                    'status4' => $this->validateAndFormatInteger($data[5] ?? null),
                    'status5' => $this->validateAndFormatInteger($data[6] ?? null),
                    'created_at' => now(),
                    'updated_at' => now()
                ];

                DB::table('attendances')->insert($record);
                $total++;
            }

            return "OK: " . $total;

        } catch (Throwable $e) {
            $data['error'] = $e;
            DB::table('error_log')->insert($data);
            report($e);
            return "ERROR: " . $total . "\n";
        }
    }

    public function test(Request $request)
    {
        $log['data'] = $request->getContent();
        DB::table('finger_log')->insert($log);
    }

    public function getRequest(Request $request)
    {
        return "OK";
    }

    private function validateAndFormatInteger($value)
    {
        return isset($value) && $value !== '' ? (int)$value : null;
    }
}
