<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ordering')->default(0);
            $table->timestamps();
        });

        Schema::create('faq_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('faq_id');
            $table->string('locale')->index();
            $table->string('question');
            $table->longText('answer');
            $table->unique(['faq_id', 'locale']);
            $table->foreign('faq_id')->references('id')->on('faqs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('faq_translations');
        Schema::dropIfExists('faqs');
    }
}
