<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->OnDelete('cascade')->nullable();
            $table->string('address')->nullable();
            $table->string('arrivingFrom')->nullable();
            $table->string('occupation')->nullable();
            $table->timestamp('start_date')->useCurrent();
            $table->integer('numberOfDays')->nullable();
            $table->string('lastDate')->nullable();
            $table->foreign('user_id')
                 ->references('id')->on('users')->cascadeOnDelete();
            $table->string('added_by');
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
        Schema::dropIfExists('customers');
    }
}
