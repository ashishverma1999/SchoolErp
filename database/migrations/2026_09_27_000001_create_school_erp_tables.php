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
        // 1. Classes
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('numeric_grade')->index();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // 2. Sections
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('classes')->cascadeOnDelete();
            $table->string('name', 50);
            $table->string('room_number', 50)->nullable();
            $table->unsignedInteger('capacity')->default(40);
            $table->timestamps();

            $table->unique(['class_id', 'name']);
        });

        // 3. Teachers
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id', 50)->unique();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 150)->unique();
            $table->string('phone', 30);
            $table->string('qualification', 150)->nullable();
            $table->date('joining_date');
            $table->string('status', 30)->default('active'); // active, inactive, on_leave
            $table->timestamps();
        });

        // 4. Students
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('admission_number', 50)->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('gender', 20); // male, female, other
            $table->date('date_of_birth');
            $table->foreignId('class_id')->constrained('classes')->cascadeOnDelete();
            $table->foreignId('section_id')->nullable()->constrained('sections')->nullOnDelete();
            $table->string('guardian_name', 150);
            $table->string('phone', 30);
            $table->text('address')->nullable();
            $table->string('photo')->nullable();
            $table->string('status', 30)->default('active'); // active, graduated, suspended
            $table->date('admission_date');
            $table->timestamps();

            $table->index(['class_id', 'section_id']);
            $table->index('status');
        });

        // 5. Attendances
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->date('date');
            $table->string('status', 20)->default('present'); // present, absent, late
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->unique(['student_id', 'date']);
            $table->index(['date', 'status']);
        });

        // 6. Timetables
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('classes')->cascadeOnDelete();
            $table->foreignId('section_id')->constrained('sections')->cascadeOnDelete();
            $table->string('day_of_week', 20); // Monday, Tuesday, Wednesday, Thursday, Friday, Saturday
            $table->unsignedTinyInteger('period_number');
            $table->string('subject_name', 100);
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->nullOnDelete();
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();

            $table->unique(['section_id', 'day_of_week', 'period_number']);
        });

        // 7. Fee Structures
        Schema::create('fee_structures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('classes')->cascadeOnDelete();
            $table->string('fee_head', 50); // tuition, transport, lab, library, admission, examination, other
            $table->decimal('amount', 10, 2);
            $table->string('frequency', 30)->default('monthly'); // monthly, quarterly, annually
            $table->timestamps();

            $table->index(['class_id', 'fee_head']);
        });

        // 8. Fee Invoices
        Schema::create('fee_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number', 50)->unique();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->foreignId('fee_structure_id')->nullable()->constrained('fee_structures')->nullOnDelete();
            $table->string('title', 150)->nullable();
            $table->date('due_date');
            $table->decimal('amount', 10, 2);
            $table->decimal('paid_amount', 10, 2)->default(0.00);
            $table->string('status', 30)->default('unpaid'); // paid, partial, unpaid
            $table->timestamps();

            $table->index(['student_id', 'status']);
            $table->index('due_date');
        });

        // 9. Fee Payments
        Schema::create('fee_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fee_invoice_id')->constrained('fee_invoices')->cascadeOnDelete();
            $table->decimal('amount_paid', 10, 2);
            $table->string('payment_mode', 30)->default('cash'); // cash, upi, card, bank, cheque
            $table->string('transaction_id', 100)->nullable();
            $table->date('payment_date');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('payment_date');
        });

        // 10. Exams
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('term', 50); // Term 1, Term 2, Final, Mid-Term
            $table->string('academic_year', 20); // e.g. 2025-2026
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->timestamps();
        });

        // 11. Exam Marks
        Schema::create('exam_marks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams')->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->string('subject_name', 100);
            $table->decimal('marks_obtained', 5, 2);
            $table->decimal('max_marks', 5, 2)->default(100.00);
            $table->string('grade', 10)->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->unique(['exam_id', 'student_id', 'subject_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_marks');
        Schema::dropIfExists('exams');
        Schema::dropIfExists('fee_payments');
        Schema::dropIfExists('fee_invoices');
        Schema::dropIfExists('fee_structures');
        Schema::dropIfExists('timetables');
        Schema::dropIfExists('attendances');
        Schema::dropIfExists('students');
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('sections');
        Schema::dropIfExists('classes');
    }
};
