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
        Schema::create('order', function (Blueprint $table) {
            $table->unsignedInteger("p_id");
            $table->unsignedInteger("r_id");
            $table->integer("quantity")->default(0);

            $table->primary(["r_id","p_id"]);
            $table->foreign("r_id")->references('r_id')->on('purchase_record')->onDelete('cascade');
            $table->foreign("p_id")->references('p_id')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
