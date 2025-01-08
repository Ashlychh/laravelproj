<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\Datatables;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Attendance;
use DB;

class DeviceController extends Controller
{
    // Display the list of devices
    public function index(Request $request)
    {
        $data['label'] = "Devices";
        $data['log'] = DB::table('devices')->select('id','serialNum','online')->orderBy('online', 'DESC')->get();
        return view('devices.index', $data);
    }

    public function DeviceLog(Request $request)
    {
        $data['label'] = "Devices Log";
        $data['log'] = DB::table('device_log')->select('id','data','url')->orderBy('id', 'DESC')->get();
        
        return view('devices.log', $data);
    }
    
    public function FingerLog(Request $request)
    {
        $data['label'] = "Finger Log";
        $data['log'] = DB::table('finger_log')->select('id', 'data', 'url')->orderBy('id', 'DESC')->get();
        return view('devices.log', $data);
    }

    public function Attendance() {
       //$attendances = Attendance::latest('timestamp')->orderBy('id', 'DESC')->paginate(15);
       $attendances = DB::table('attendances')->select('id', 'sn', 'table', 'stamp', 'employee_id', 'timestamp', 'status1', 'status2', 'status3', 'status4', 'status5')->orderBy('id', 'DESC')->paginate(15);

        return view('devices.attendance', compact('attendances'));
        
    }

    // // Display the form to add a new device
    // public function create()
    // {
    //     return view('devices.create');
    // }

    // // Save the new device to the database
    // public function store(Request $request)
    // {
    //     $device = new Device();
    //     $device->name = $ request->input('name');
    //     $device->no_sn = $request->input('no_sn');
    //     $device->location = $request->input('location');
    //     $device->save();

    //     return redirect()->route('devices.index')->with('success', 'Device successfully added!');
    // }

    // // Display the device details
    // public function show($id)
    // {
    //     $device = Device::find($id);
    //     return view('devices.show', compact('device'));
    // }

    // // Display the form to edit a device
    // public function edit($id)
    // {
    //     $device = Device::find($id);
    //     return view('devices.edit', compact('device'));
    // }

    // // Update the device in the database
    // public function update(Request $request, $id)
    // {
    //     $device = Device::find($id);
    //     $device->name = $request->input('name');
    //     $device->no_sn = $request->input('no_sn');
    //     $device->location = $request->input('location');
    //     $device->save();

    //     return redirect()->route('devices.index')->with('success', 'Device successfully updated!');
    // }

    // // Delete the device from the database
    // public function destroy($id)
    // {
    //     $device = Device::find($id);
    //     $device->delete();

    //     return redirect()->route('devices.index')->with('success', 'Device successfully deleted!');
    // }
}
