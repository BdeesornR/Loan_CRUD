<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_loans', function (Blueprint $table) {
            $table->id();
            $table->decimal('loan_amount', 14, 2);
            $table->integer('loan_term')->unsigned();
            $table->date('start_date');
            $table->decimal('interest_rate', 5, 2);
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
        Schema::dropIfExists('main_loans');
    }
}
