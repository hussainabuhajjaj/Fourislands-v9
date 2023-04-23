<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionalEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotional_emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject');
            $table->text('message');
            $table->text('attachments')->nullable();
            $table->text('recipients');
            $table->timestamp('sent_at')->nullable();
            $table->string('status')->default('PENDING');
            $table->dateTime('scheduled_at')->nullable()->format('YYYY-MM-DD HH:ii:ss');
            $table->integer('total_recipients')->nullable();
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
        Schema::dropIfExists('promotional_emails');
    }
}
