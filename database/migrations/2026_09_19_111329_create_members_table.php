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
        Schema::create('members', function (Blueprint $table) 
        { $table->id(); $table->string('name'); $table->string('mobile', 15); 
        $table->string('email')->nullable(); $table->date('joining_date');
         $table->foreignId('plan_id')->constrained('plans')->onDelete('cascade'); 
         $table->date('expiry_date'); $table->decimal('fee_amount', 10, 2);
          $table->enum('fee_status', ['Paid', 'Pending', 'Partial'])->default('Pending'); $table->timestamps();
           });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
