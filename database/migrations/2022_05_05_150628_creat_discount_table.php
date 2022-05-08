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
        Schema::create('discount', function (Blueprint $table) {
            $table->unsignedInteger("d_id");
            $table->string("d_name", 50);
            $table->integer("d_price");
            $table->time("starttime");
            $table->time("endtime");
           
            $table->primary(["d_id", "d_name"]);
            $table->foreign("d_id")->references('u_id')->on('merchant')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount');
    }
};
