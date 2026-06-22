<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ระบบเช็คชื่อนักเรียน') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4 text-right">
                        <a href="{{ route('attendance.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            + เพิ่มการเช็คชื่อ
                        </a>
                    </div>

                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">วันที่</th>
                                <th class="border border-gray-300 px-4 py-2">รหัสนักเรียน</th>
                                <th class="border border-gray-300 px-4 py-2">ชื่อ-นามสกุล</th>
                                <th class="border border-gray-300 px-4 py-2">ชั้นเรียน</th>
                                <th class="border border-gray-300 px-4 py-2">เบอร์โทร</th>
                                <th class="border border-gray-300 px-4 py-2">สถานะ</th>
                                <th class="border border-gray-300 px-4 py-2">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $item)
                            <tr class="text-center">
                                <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $item->student_id }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-left">{{ $item->name }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $item->class_room }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $item->phone }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    @if($item->status == 'มา')
                                        <span class="text-green-600 font-bold">มา</span>
                                    @elseif($item->status == 'ขาด')
                                        <span class="text-red-600 font-bold">ขาด</span>
                                    @elseif($item->status == 'ลา')
                                        <span class="text-yellow-600 font-bold">ลา</span>
                                    @else
                                        <span class="text-orange-600 font-bold">สาย</span>
                                    @endif
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="{{ route('attendance.edit', $item->id) }}" class="text-blue-500 hover:underline mr-2">แก้ไข</a>
                                    <form action="{{ route('attendance.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">ลบ</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $attendances->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>