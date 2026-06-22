<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // 1. หน้าแสดงข้อมูลทั้งหมด
    public function index()
    {
        // เปลี่ยนจาก ->get() เป็น ->paginate(10) เพื่อแบ่งหน้าละ 10 รายการ
        $attendances = Attendance::orderBy('date', 'desc')->paginate(10);
        return view('attendance.index', compact('attendances'));
    }

    // 2. หน้าฟอร์มเพิ่มข้อมูล
    public function create()
    {
        return view('attendance.create');
    }

    // 3. บันทึกข้อมูลใหม่ลงฐานข้อมูล
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'name' => 'required',
            'status' => 'required',
            'date' => 'required|date',
        ]);

        Attendance::create($request->all());
        return redirect()->route('attendance.index')->with('success', 'บันทึกการเช็คชื่อเรียบร้อยแล้ว!');
    }

    // 4. หน้าฟอร์มแก้ไขข้อมูล
    public function edit(Attendance $attendance)
    {
        return view('attendance.edit', compact('attendance'));
    }

    // 5. อัปเดตข้อมูลที่แก้ไข
    public function update(Request $request, Attendance $attendance)
    {
        // เอาโค้ดนี้ไปแทนที่ $request->validate([...]); เดิมทั้งในฟังก์ชัน store และ update
        $request->validate([
            'student_id' => 'required',
            'name' => 'required',
            'class_room' => 'required',
            'phone' => 'required|numeric', // บังคับกรอกเบอร์โทรเป็นตัวเลข
            'status' => 'required',
            'date' => 'required|date',
        ]);
        $attendance->update($request->all());
        return redirect()->route('attendance.index')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว!');
    }

    // 6. ลบข้อมูล
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendance.index')->with('success', 'ลบข้อมูลเรียบร้อยแล้ว!');
    }
}