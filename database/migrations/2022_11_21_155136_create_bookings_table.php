<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('house_id');
            $table->string('email');
            $table->date('booking_date');
            $table->timestamps();
            // $table->string('owner_id');
            // $table->string("owner_name");
            // $table->text("location");
            // $table->string("name");
            // $table->string("email");
            // $table->date("booking_date");
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
