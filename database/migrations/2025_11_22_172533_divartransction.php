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
    public function up(): void
    {
        Schema::create('transactions_divar', function (Blueprint $table) {
            $table->id(); // id
            $table->bigIncrements('transaction_id'); // شناسه تراکنش
            $table->decimal('profit', 15, 0); // سود
            $table->decimal('amount', 15, 0); // مبلغ پرداختی
            $table->string('service_shnase')->unique();; // شناسه سرویس
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
