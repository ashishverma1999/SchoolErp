<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Exam;
use App\Models\ExamMark;
use App\Models\FeeInvoice;
use App\Models\FeePayment;
use App\Models\FeeStructure;
use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Timetable;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SchoolErpSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Classes & Grades
        $classesData = [
            ['name' => 'Nursery', 'numeric_grade' => 0, 'description' => 'Early childhood foundation learning and social skills'],
            ['name' => 'Class 1', 'numeric_grade' => 1, 'description' => 'Primary foundational numeracy and literacy'],
            ['name' => 'Class 5', 'numeric_grade' => 5, 'description' => 'Upper primary academic curriculum'],
            ['name' => 'Class 8', 'numeric_grade' => 8, 'description' => 'Middle school comprehensive curriculum'],
            ['name' => 'Class 9', 'numeric_grade' => 9, 'description' => 'Secondary CBSE foundation year'],
            ['name' => 'Class 10', 'numeric_grade' => 10, 'description' => 'Board examination batch (Secondary CBSE)'],
            ['name' => 'Class 11', 'numeric_grade' => 11, 'description' => 'Senior Secondary Science & Commerce streams'],
            ['name' => 'Class 12', 'numeric_grade' => 12, 'description' => 'Senior Secondary CBSE Board examination batch'],
        ];

        $classes = [];
        foreach ($classesData as $data) {
            $classes[$data['numeric_grade']] = SchoolClass::firstOrCreate(
                ['numeric_grade' => $data['numeric_grade']],
                $data
            );
        }

        // 2. Sections
        $sections = [];
        foreach ($classes as $numericGrade => $class) {
            $sections[$numericGrade]['A'] = Section::firstOrCreate(
                ['class_id' => $class->id, 'name' => 'A'],
                ['room_number' => 'Room ' . (100 + $numericGrade * 10 + 1), 'capacity' => 40]
            );
            $sections[$numericGrade]['B'] = Section::firstOrCreate(
                ['class_id' => $class->id, 'name' => 'B'],
                ['room_number' => 'Room ' . (100 + $numericGrade * 10 + 2), 'capacity' => 40]
            );
        }

        // 3. Teachers
        $teachersData = [
            ['employee_id' => 'EMP-2024-001', 'first_name' => 'Rajesh', 'last_name' => 'Sharma', 'email' => 'rajesh.sharma@ksnschool.edu.in', 'phone' => '+91 98765 43210', 'qualification' => 'M.Sc. Mathematics, B.Ed', 'joining_date' => '2021-06-15', 'status' => 'active'],
            ['employee_id' => 'EMP-2024-002', 'first_name' => 'Sunita', 'last_name' => 'Verma', 'email' => 'sunita.verma@ksnschool.edu.in', 'phone' => '+91 98765 43211', 'qualification' => 'M.Sc. Physics, M.Ed', 'joining_date' => '2020-04-10', 'status' => 'active'],
            ['employee_id' => 'EMP-2024-003', 'first_name' => 'Amit', 'last_name' => 'Kumar', 'email' => 'amit.kumar@ksnschool.edu.in', 'phone' => '+91 98765 43212', 'qualification' => 'M.A. English Literature, B.Ed', 'joining_date' => '2022-07-01', 'status' => 'active'],
            ['employee_id' => 'EMP-2024-004', 'first_name' => 'Priya', 'last_name' => 'Singh', 'email' => 'priya.singh@ksnschool.edu.in', 'phone' => '+91 98765 43213', 'qualification' => 'M.Sc. Chemistry, NET', 'joining_date' => '2023-01-16', 'status' => 'active'],
            ['employee_id' => 'EMP-2024-005', 'first_name' => 'Vikash', 'last_name' => 'Patel', 'email' => 'vikash.patel@ksnschool.edu.in', 'phone' => '+91 98765 43214', 'qualification' => 'MCA, B.Tech CS', 'joining_date' => '2022-03-20', 'status' => 'active'],
            ['employee_id' => 'EMP-2024-006', 'first_name' => 'Neha', 'last_name' => 'Gupta', 'email' => 'neha.gupta@ksnschool.edu.in', 'phone' => '+91 98765 43215', 'qualification' => 'M.Sc. Zoology, B.Ed', 'joining_date' => '2023-08-10', 'status' => 'active'],
        ];

        $teachers = [];
        foreach ($teachersData as $tData) {
            $teachers[] = Teacher::firstOrCreate(
                ['employee_id' => $tData['employee_id']],
                $tData
            );
        }

        // 4. Students
        $studentsData = [
            ['admission_number' => 'ADM-2026-001', 'first_name' => 'Aarav', 'last_name' => 'Sharma', 'gender' => 'male', 'date_of_birth' => '2010-04-12', 'grade' => 10, 'sec' => 'A', 'guardian_name' => 'Manoj Sharma', 'phone' => '+91 99112 23344', 'address' => '45, Civil Lines, Kanpur'],
            ['admission_number' => 'ADM-2026-002', 'first_name' => 'Ananya', 'last_name' => 'Verma', 'gender' => 'female', 'date_of_birth' => '2010-08-25', 'grade' => 10, 'sec' => 'A', 'guardian_name' => 'Deepak Verma', 'phone' => '+91 99112 23345', 'address' => '12B, Swaroop Nagar, Kanpur'],
            ['admission_number' => 'ADM-2026-003', 'first_name' => 'Rohan', 'last_name' => 'Gupta', 'gender' => 'male', 'date_of_birth' => '2010-11-05', 'grade' => 10, 'sec' => 'B', 'guardian_name' => 'Sanjay Gupta', 'phone' => '+91 99112 23346', 'address' => '88, Kakadeo, Kanpur'],
            ['admission_number' => 'ADM-2026-004', 'first_name' => 'Diya', 'last_name' => 'Singh', 'gender' => 'female', 'date_of_birth' => '2011-02-18', 'grade' => 9, 'sec' => 'A', 'guardian_name' => 'Vikram Singh', 'phone' => '+91 99112 23347', 'address' => '102, Kidwai Nagar, Kanpur'],
            ['admission_number' => 'ADM-2026-005', 'first_name' => 'Aditya', 'last_name' => 'Mishra', 'gender' => 'male', 'date_of_birth' => '2011-06-30', 'grade' => 9, 'sec' => 'B', 'guardian_name' => 'Ashok Mishra', 'phone' => '+91 99112 23348', 'address' => '22, Govind Nagar, Kanpur'],
            ['admission_number' => 'ADM-2026-006', 'first_name' => 'Ishita', 'last_name' => 'Tiwari', 'gender' => 'female', 'date_of_birth' => '2012-09-14', 'grade' => 8, 'sec' => 'A', 'guardian_name' => 'Ramesh Tiwari', 'phone' => '+91 99112 23349', 'address' => '71, Kalyanpur, Kanpur'],
            ['admission_number' => 'ADM-2026-007', 'first_name' => 'Kabir', 'last_name' => 'Khan', 'gender' => 'male', 'date_of_birth' => '2012-12-01', 'grade' => 8, 'sec' => 'B', 'guardian_name' => 'Imran Khan', 'phone' => '+91 99112 23350', 'address' => '15, Parade, Kanpur'],
            ['admission_number' => 'ADM-2026-008', 'first_name' => 'Saanvi', 'last_name' => 'Yadav', 'gender' => 'female', 'date_of_birth' => '2015-05-19', 'grade' => 5, 'sec' => 'A', 'guardian_name' => 'Pradeep Yadav', 'phone' => '+91 99112 23351', 'address' => '34, Barra 2, Kanpur'],
            ['admission_number' => 'ADM-2026-009', 'first_name' => 'Reyansh', 'last_name' => 'Pandey', 'gender' => 'male', 'date_of_birth' => '2015-08-08', 'grade' => 5, 'sec' => 'B', 'guardian_name' => 'Vivek Pandey', 'phone' => '+91 99112 23352', 'address' => '9, Sharda Nagar, Kanpur'],
            ['admission_number' => 'ADM-2026-010', 'first_name' => 'Myra', 'last_name' => 'Saxena', 'gender' => 'female', 'date_of_birth' => '2019-03-22', 'grade' => 1, 'sec' => 'A', 'guardian_name' => 'Nitin Saxena', 'phone' => '+91 99112 23353', 'address' => '60, Lajpat Nagar, Kanpur'],
            ['admission_number' => 'ADM-2026-011', 'first_name' => 'Atharv', 'last_name' => 'Chauhan', 'gender' => 'male', 'date_of_birth' => '2008-07-11', 'grade' => 12, 'sec' => 'A', 'guardian_name' => 'Sunil Chauhan', 'phone' => '+91 99112 23354', 'address' => '108, Ratan Lal Nagar, Kanpur'],
            ['admission_number' => 'ADM-2026-012', 'first_name' => 'Tanvi', 'last_name' => 'Agarwal', 'gender' => 'female', 'date_of_birth' => '2008-10-03', 'grade' => 12, 'sec' => 'A', 'guardian_name' => 'Anil Agarwal', 'phone' => '+91 99112 23355', 'address' => '5, Mall Road, Kanpur'],
        ];

        $students = [];
        foreach ($studentsData as $s) {
            $class = $classes[$s['grade']];
            $section = $sections[$s['grade']][$s['sec']];

            $students[] = Student::firstOrCreate(
                ['admission_number' => $s['admission_number']],
                [
                    'first_name' => $s['first_name'],
                    'last_name' => $s['last_name'],
                    'gender' => $s['gender'],
                    'date_of_birth' => $s['date_of_birth'],
                    'class_id' => $class->id,
                    'section_id' => $section->id,
                    'guardian_name' => $s['guardian_name'],
                    'phone' => $s['phone'],
                    'address' => $s['address'],
                    'status' => 'active',
                    'admission_date' => '2024-04-01',
                ]
            );
        }

        // 5. Fee Structures
        $feeStructures = [];
        foreach ($classes as $numericGrade => $class) {
            $monthlyTuition = 2500 + ($numericGrade * 350);
            $feeStructures[$numericGrade]['tuition'] = FeeStructure::firstOrCreate(
                ['class_id' => $class->id, 'fee_head' => 'tuition'],
                ['amount' => $monthlyTuition, 'frequency' => 'monthly']
            );

            $feeStructures[$numericGrade]['transport'] = FeeStructure::firstOrCreate(
                ['class_id' => $class->id, 'fee_head' => 'transport'],
                ['amount' => 1500, 'frequency' => 'monthly']
            );

            if ($numericGrade >= 9) {
                $feeStructures[$numericGrade]['lab'] = FeeStructure::firstOrCreate(
                    ['class_id' => $class->id, 'fee_head' => 'lab'],
                    ['amount' => 1200, 'frequency' => 'quarterly']
                );
            }
        }

        // 6. Invoices & Payments (Past 6 months + Current Month for chart!)
        $now = Carbon::now();
        foreach ($students as $index => $student) {
            $classGrade = $student->schoolClass->numeric_grade;
            $structure = $feeStructures[$classGrade]['tuition'] ?? null;
            $tuitionAmount = $structure ? $structure->amount : 3500;

            for ($m = 5; $m >= 0; $m--) {
                $billingMonth = $now->copy()->subMonths($m);
                $dueDate = $billingMonth->copy()->startOfMonth()->addDays(10);
                $invNumber = 'INV-' . $billingMonth->format('Ym') . '-' . str_pad((string) ($index + 1), 4, '0', STR_PAD_LEFT);

                // Most past invoices paid, current month partially or unpaid
                $isPaidMonth = ($m > 0) || ($index % 3 === 0);
                $status = $isPaidMonth ? 'paid' : ($index % 2 === 0 ? 'partial' : 'unpaid');
                $paidAmount = match ($status) {
                    'paid' => $tuitionAmount,
                    'partial' => round($tuitionAmount / 2, 2),
                    default => 0.00,
                };

                $invoice = FeeInvoice::firstOrCreate(
                    ['invoice_number' => $invNumber],
                    [
                        'student_id' => $student->id,
                        'fee_structure_id' => $structure?->id,
                        'title' => $billingMonth->format('F Y') . ' Tuition Fee',
                        'due_date' => $dueDate->toDateString(),
                        'amount' => $tuitionAmount,
                        'paid_amount' => $paidAmount,
                        'status' => $status,
                    ]
                );

                if ($paidAmount > 0 && $invoice->payments()->count() === 0) {
                    FeePayment::create([
                        'fee_invoice_id' => $invoice->id,
                        'amount_paid' => $paidAmount,
                        'payment_mode' => $index % 2 === 0 ? 'upi' : 'cash',
                        'transaction_id' => 'TXN-' . $billingMonth->format('Ymd') . '-' . rand(1000, 9999),
                        'payment_date' => $dueDate->copy()->subDays(2)->toDateString(),
                        'notes' => 'Received via School ERP billing counter',
                    ]);
                }
            }
        }

        // 7. Attendances (Today & Past 5 Days)
        for ($d = 5; $d >= 0; $d--) {
            $attDate = Carbon::today()->subDays($d);
            // Skip Sunday
            if ($attDate->isSunday()) continue;

            foreach ($students as $key => $student) {
                // 90% present rate
                $status = ($key % 10 === 0) ? 'absent' : (($key % 7 === 0) ? 'late' : 'present');
                Attendance::firstOrCreate(
                    ['student_id' => $student->id, 'date' => $attDate->toDateString()],
                    [
                        'status' => $status,
                        'remarks' => $status === 'absent' ? 'Sick leave requested by parent' : ($status === 'late' ? 'Traffic delay' : null),
                    ]
                );
            }
        }

        // 8. Timetable
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $subjects = ['Mathematics', 'Science', 'English Literature', 'Social Studies', 'Computer Science'];

        foreach ($classes as $numGrade => $class) {
            $secA = $sections[$numGrade]['A'];
            foreach ($days as $day) {
                for ($period = 1; $period <= 5; $period++) {
                    $teacher = $teachers[($period - 1) % count($teachers)];
                    $subject = $subjects[$period - 1];

                    Timetable::firstOrCreate(
                        ['section_id' => $secA->id, 'day_of_week' => $day, 'period_number' => $period],
                        [
                            'class_id' => $class->id,
                            'subject_name' => $subject,
                            'teacher_id' => $teacher->id,
                            'start_time' => sprintf('%02d:00:00', 7 + $period),
                            'end_time' => sprintf('%02d:45:00', 7 + $period),
                        ]
                    );
                }
            }
        }

        // 9. Exams & Marks
        $midTermExam = Exam::firstOrCreate(
            ['name' => 'Mid-Term Examination 2026'],
            [
                'term' => 'Term 1',
                'academic_year' => '2025-2026',
                'start_date' => '2026-09-10',
                'end_date' => '2026-09-20',
            ]
        );

        $examSubjects = ['Mathematics', 'Science', 'English', 'Computer Science'];
        foreach ($students as $idx => $student) {
            foreach ($examSubjects as $sIdx => $subject) {
                $baseMarks = 65 + (($idx * 3 + $sIdx * 7) % 35); // between 65 and 99
                ExamMark::firstOrCreate(
                    [
                        'exam_id' => $midTermExam->id,
                        'student_id' => $student->id,
                        'subject_name' => $subject,
                    ],
                    [
                        'marks_obtained' => $baseMarks,
                        'max_marks' => 100,
                        'remarks' => $baseMarks >= 90 ? 'Outstanding conceptual clarity' : 'Good performance',
                    ]
                );
            }
        }
    }
}
