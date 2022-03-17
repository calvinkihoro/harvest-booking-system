<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('dob');
            $table->string('current_position');
            $table->string('current_salary');
            $table->string('id_number')->nullable();
            $table->string('home_address');
            $table->foreign('user_id')
                ->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_records');
    }
}
