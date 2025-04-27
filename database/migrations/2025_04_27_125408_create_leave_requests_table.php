<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('reason')->nullable();
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->enum('leave_type', ['Sick', 'Vacation', 'Personal', 'Maternity', 'Other'])->default('Other');  // Added leave_type column
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('leave_requests');
    }
};
