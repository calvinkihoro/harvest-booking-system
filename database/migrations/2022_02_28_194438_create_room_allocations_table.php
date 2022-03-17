<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->string('fromDate');
            $table->string('toDate');
            $table->foreign('customer_id')
                ->references('id')->on('customers')->cascadeOnDelete();
            $table->foreignId('room_id');
            $table->foreign('room_id')
                ->references('id')->on('rooms')->cascadeOnDelete();
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
        Schema::dropIfExists('room_allocations');
    }
}
