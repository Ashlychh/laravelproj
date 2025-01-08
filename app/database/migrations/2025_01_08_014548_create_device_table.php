<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('serialNum')->unique();
            $table->string('location')->nullable();
            $table->datetime('online')->nullable();
            
            // Option 1: Use CURRENT_TIMESTAMP on insert
            $table->timestamp('created_at')->useCurrent();

            // Option 2: Use CURRENT_TIMESTAMP on insert and update
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
