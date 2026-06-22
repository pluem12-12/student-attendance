<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('เพิ่มการเช็คชื่อ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 max-w-lg mx-auto">
                    
                    <form action="{{ route('attendance.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">วันที่:</label>
                            <input type="date" name="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">รหัสนักเรียน:</label>
                            <input type="text" name="student_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">ชื่อ-นามสกุล:</label>
                            <input type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">สถานะ:</label>
                            <select name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                                <option value="มา">มา</option>
                                <option value="ขาด">ขาด</option>
                                <option value="ลา">ลา</option>
                                <option value="สาย">สาย</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">บันทึกข้อมูล</button>
                            <a href="{{ route('attendance.index') }}" class="text-gray-500 hover:underline">ยกเลิก</a>
                        </div>
                        <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">ชั้นเรียน (เช่น ม.4/1):</label>
                        <input type="text" name="class_room" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">เบอร์โทรศัพท์:</label>
                        <input type="text" name="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>