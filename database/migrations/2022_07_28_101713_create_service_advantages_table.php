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
        Schema::create('service_advantages', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('desc');

            $table->foreignId('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

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
        Schema::dropIfExists('service_advantages');
    }
};
