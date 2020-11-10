<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseorder', function (Blueprint $table) {
            $table->integer('id');
            $table->string('code')->unique();
            $table->date('date');
            $table->string('desc');
            $table->string('color');
            $table->char('unit', 5);
            $table->integer('qty');
            $table->integer('price');
            $table->integer('sub');
            $table->integer('total');
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
        Schema::dropIfExists('purchaseorder');
    }
}
