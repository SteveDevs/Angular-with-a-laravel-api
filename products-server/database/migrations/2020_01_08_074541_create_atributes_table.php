<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('attribute', 255);
        });

        DB::table('attributes')->insert(
        [
            'attribute' => 'size'
        ]);

        DB::table('attributes')->insert(
        [
            'attribute' => 'grams'
        ]);

        DB::table('attributes')->insert(
        [
            'attribute' => 'foo'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atributes');
    }
}
