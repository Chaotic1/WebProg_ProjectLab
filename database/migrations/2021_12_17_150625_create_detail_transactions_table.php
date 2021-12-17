<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('header_id');
            $table->foreign('header_id')->references('id')->on('header_transactions')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('book_id');
            $table->string('title');
            $table->string('author');
            $table->longText('description');
            $table->integer('price');
            $table->string('cover');
            $table->integer('quantity');
            $table->integer('grand_total');
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
        Schema::dropIfExists('detail_transactions');
    }
}
