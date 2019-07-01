<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
     public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('id_type')->unsigned();
    $table->foreign('id_type')->references('id')->on('type_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('products', function(Blueprint $table){
            $table->dropForeign(['id_type']);
        });

        Schema::dropIfExists('products');
        Schema::enableForeignKeyConstraints();
    }
}
