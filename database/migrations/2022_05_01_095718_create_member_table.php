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
        Schema::create('member', function (Blueprint $table) {
            $table->unsignedInteger("U_Id");
            $table->string("Name", 50);
            $table->char("Phone", 10);
            $table->string("Address", 50);
            $table->unsignedInteger("Points");

            $table->primary("U_Id");
            $table->foreign("U_Id")->references('U_Id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
};
