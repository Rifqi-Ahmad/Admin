<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podetail', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->string('pocode');
            $table->string('code');
            $table->string('desc');
            $table->string('color');
            $table->string('unit');
            $table->integer('qty');
            $table->integer('price');
            $table->integer('sub');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('podetail');
    }
}
