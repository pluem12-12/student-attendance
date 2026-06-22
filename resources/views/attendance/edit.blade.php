<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('แก้ไขการเช็คชื่อ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 max-w-lg mx-auto">
                    
                    <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">วันที่:</label>
                            <input type="date" name="date" value="{{ $attendance->date }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">รหัสนักเรียน:</label>
                            <input type="text" name="student_id" value="{{ $attendance->student_id }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">ชื่อ-นามสกุล:</label>
                            <input type="text" name="name" value="{{ $attendance->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">สถานะ:</label>
                            <select name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                                <option value="มา" {{ $attendance->status == 'มา' ? 'selected' : '' }}>มา</option>
                                <option value="ขาด" {{ $attendance->status == 'ขาด' ? 'selected' : '' }}>ขาด</option>
                                <option value="ลา" {{ $attendance->status == 'ลา' ? 'selected' : '' }}>ลา</option>
                                <option value="สาย" {{ $attendance->status == 'สาย' ? 'selected' : '' }}>สาย</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">อัปเดตข้อมูล</button>
                            <a href="{{ route('attendance.index') }}" class="text-gray-500 hover:underline">ยกเลิก</a>
                        </div>
                        <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">ชั้นเรียน:</label>
                        <input type="text" name="class_room" value="{{ $attendance->class_room }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">เบอร์โทรศัพท์:</label>
                        <input type="text" name="phone" value="{{ $attendance->phone }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>