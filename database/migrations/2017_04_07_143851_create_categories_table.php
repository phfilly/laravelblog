<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->text('name');
            $table->timestamps();
        });

        DB::table('categories')->insert(array('name' => 'Sport'));
        DB::table('categories')->insert(array('name' => 'Travel'));
        DB::table('categories')->insert(array('name' => 'Food'));
        DB::table('categories')->insert(array('name' => 'Health'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
