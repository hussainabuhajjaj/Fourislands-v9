<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name')->nullable();
            $table->string('contact_person');
            $table->string('email');
            $table->string('phone');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->longText('message');
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('service_id')->references('id')->on('services')->onDelete('set null');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quote_requests');
    }
}
