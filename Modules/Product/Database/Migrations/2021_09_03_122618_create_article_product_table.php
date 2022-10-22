<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('CASCADE')->onUpdate('NO ACTION');
            $table->unsignedbigInteger('article_id')->unsigned();
            $table->foreign('article_id')->references('id')
                ->on('articles')->onDelete('CASCADE')->onUpdate('NO ACTION');
            $table->integer('amount');

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
        Schema::dropIfExists('permission_role');
    }
}
