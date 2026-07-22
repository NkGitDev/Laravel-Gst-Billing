<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vendor_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('party_id')->nullable()->constrained('parties');
            $table->string("account_holder_name")->nullable();
            $table->string("account_number")->nullable();
            $table->date("invoice_date")->nullable();
            $table->string("invoice_number")->nullable();
            $table->mediumText("item_description")->nullable();
            $table->float("total_amount", 10, 2)->default(0);
            $table->text("declaration")->nullable();
            $table->string("bank_name")->nullable();
            $table->string("ifsc_code")->nullable();
            $table->text("branch_name")->nullable();
            $table->tinyInteger("is_deleted")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_invoices');
    }
};
