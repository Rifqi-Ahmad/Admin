<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

class CreateMasterbarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement("CREATE SEQUENCE masterbarang_seq;");

        Schema::create('masterbarang', function (Blueprint $table) {
            $table->increments('id');
            $table->char('code', 6)->unique();
            $table->string('desc');
            $table->string('color');
            $table->char('size', 5);
            $table->integer('prize');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE masterbarang ALTER COLUMN id SET NOT NULL ALTER COLUMN id set DEFAULT NEXTVAL ('masterbarang_seq') ALTER SEQUENCE masterbarang_seq
        OWNED BY masterbarang.id;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masterbarang');
    }
}
