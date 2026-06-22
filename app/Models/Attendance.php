<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // อนุญาตให้บันทึกข้อมูลเหล่านี้ลงฐานข้อมูลได้
    protected $fillable = ['student_id', 'name', 'class_room', 'phone', 'status', 'date'];
}
