<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('attendances', function (Blueprint $table) {
        $table->id();
        $table->foreignId('employee_id')->constrained()->onDelete('cascade'); // Assumes employees table exists
        $table->date('attendance_date');
        $table->enum('status', ['Present', 'Absent', 'Leave']); // Or any status you prefer
        $table->timestamps();
    });
}

    
};
