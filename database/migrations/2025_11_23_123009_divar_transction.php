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
        Schema::create('divar_transactions', function (Blueprint $table) {
            $table->id(); // id
            $table->bigInteger('transaction_id')->unsigned()->unique();
            $table->decimal('profit', 15, 0); // سود
            $table->decimal('amount', 15, 0); // مبلغ پرداختی
            $table->string('service_shnase')->unique();; // شناسه سرویس
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
        Schema::dropIfExists('transactions_divar');
    }
};
