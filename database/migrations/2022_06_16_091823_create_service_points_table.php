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
        Schema::create('service_points', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('address');
            $table->string('phone');
            $table->string('second_phone');
            $table->json('working_hours');
            $table->string('category');
            $table->decimal('lat')->nullable();
            $table->decimal('lng')->nullable();
            $table->boolean('is_active')->default(1);

            $table->foreignId('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_points');
    }
};
