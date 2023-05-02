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
        // products description here (it will then migrate to table)
        Schema::create('products', function (Blueprint $table) {
            // id_товара, название, описание, цена, категория, ссылка на изображение
            $table->id();
            $table->timestamps();

            $table->string("article");
            $table->string("description")->nullable();
            $table->float("price");
            $table->string("category");
            $table->string("picturesource");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
