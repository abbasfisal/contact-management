<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')->nullable()->constrained('customers');

            $table->foreignId('status_id')->nullable()->constrained('statuses');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->foreignId('operator_id')->nullable()->constrained('operators');

            $table->enum('satisfaction_rate', [1, 2, 3, 4, 5])->nullable();
            $table->time('duration')->default('00:00:00');
            $table->string('comment')->nullable();
            $table->string('called_number');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
