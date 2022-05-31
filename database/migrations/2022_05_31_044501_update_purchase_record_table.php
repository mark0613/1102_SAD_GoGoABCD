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
        Schema::table('purchase_record', function (Blueprint $table) {
            $table->dropForeign(['p_id']);
            $table->dropColumn('p_id');
            $table->dropColumn('quantity');
            $table->unsignedInteger("cost");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
