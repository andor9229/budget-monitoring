<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('amount');
            $table->float('payee')->nullable();
            $table->timestamp('date')->default(now());
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('transaction_type_id');
            $table->timestamps();

            $table->foreign('account_id')
                ->references('id')
                ->on('accounts');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

            $table->foreign('transaction_type_id')
                ->references('id')
                ->on('transaction_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
