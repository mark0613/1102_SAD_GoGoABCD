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
            $table->unsignedInteger("u_id");
            $table->string("name", 50)->default("");
            $table->char("phone", 10)->default("");
            $table->string("address", 50)->default("");
            $table->unsignedInteger("points")->default(0);

            $table->primary("u_id");
            $table->foreign("u_id")->references('u_id')->on('users')->onDelete('cascade');
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
