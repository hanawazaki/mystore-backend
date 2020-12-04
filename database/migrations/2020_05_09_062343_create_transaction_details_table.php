<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transactions_id')->unsigned();
            $table->bigInteger('products_id')->unsigned();
            
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('transaction_details', function(Blueprint $table) {
			$table->foreign('transactions_id')->references('id')->on('transactions')
				  ->onDelete('restrict')
				  ->onUpdate('restrict');
        });
        
        Schema::table('transaction_details', function(Blueprint $table) {
			$table->foreign('products_id')->references('id')->on('products')
				  ->onDelete('restrict')
				  ->onUpdate('restrict');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
}
