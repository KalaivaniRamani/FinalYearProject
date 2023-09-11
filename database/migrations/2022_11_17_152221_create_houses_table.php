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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string("owner_name");
            $table->string('owner_id');
            $table->string('owner_status');
            $table->double('distance', 15, 2);
            $table->text("location");
            $table->text("house_picture");
            $table->float('rental_price', 8, 2);
            $table->text("house_type");
            $table->string('booking_status')->default('Vacant');
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
        Schema::dropIfExists('houses');
    }
};
