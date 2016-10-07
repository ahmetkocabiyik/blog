<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMakalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makaleler', function (Blueprint $table) {
            $table->increments('id');
            $table->string('baslik');
            $table->string('slug');
            $table->text('icerik');
            $table->integer('kategori_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->tinyInteger('durum');
            $table->timestamps();
        });

        Schema::table("makaleler",function($table){
           $table->foreign("kategori_id","makale_kategori_fk")->references("id")->on("kategoriler")->onDelete('cascade');
        });

        Schema::table("makaleler",function($table){
            $table->foreign("user_id","makale_user_fk")->references("id")->on("users")->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('makaleler');
    }
}
