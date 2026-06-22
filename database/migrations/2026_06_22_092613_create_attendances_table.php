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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('student_id'); // รหัสนักเรียน
            $table->string('name');       // ชื่อ-นามสกุล
            $table->string('class_room')->nullable(); // ชั้นเรียน (เพิ่มใหม่)
            $table->string('phone')->nullable();      // เบอร์โทรศัพท์ (เพิ่มใหม่)
            $table->string('status');     // สถานะ
            $table->date('date');         // วันที่
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
