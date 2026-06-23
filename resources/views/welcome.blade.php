<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบเช็คชื่อนักเรียน</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full bg-white rounded-lg shadow-md p-8 text-center">
        <!-- โลโก้หรือไอคอน (สามารถเปลี่ยนได้) -->
        <div class="mb-6 flex justify-center">
            <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        </div>
        
        <h1 class="text-2xl font-bold text-gray-800 mb-2">ยินดีต้อนรับ</h1>
        <p class="text-gray-600 mb-8">เข้าสู่ระบบเช็คชื่อนักเรียน กรุณาเลือกรายการ</p>

        <div class="space-y-4">
            <!-- ปุ่มเข้าสู่ระบบ -->
            <a href="{{ route('login') }}" class="block w-full px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-200">
                เข้าสู่ระบบ (Login)
            </a>
            
            <!-- ปุ่มสมัครสมาชิก -->
            <a href="{{ route('register') }}" class="block w-full px-4 py-3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold rounded-lg transition duration-200">
                สร้างบัญชีใหม่ (Register)
            </a>
        </div>
    </div>
</body>
</html>