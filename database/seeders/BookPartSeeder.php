<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookPartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_parts')->insert([
            [
                'part_number' => 1,
                'part_title' => 'Phần 1: Tâm Lý Con Người',
                'book_id' => 1,
            ],
            [
                'part_number' => 2,
                'part_title' => 'Phần 2: Kỹ Năng Giao Tiếp Hiệu Quả',
                'book_id' => 1,
            ],
            [
                'part_number' => 3,
                'part_title' => 'Phần 3: Quan Hệ Giàu Có và Hạnh Phúc',
                'book_id' => 1,
            ],
        ]);

        DB::table('book_parts')->insert([
            [
                'part_number' => 1,
                'part_title' => 'Phần 1: Tư Duy Nhanh',
                'book_id' => 2,
            ],
            [
                'part_number' => 2,
                'part_title' => 'Phần 2: Tư Duy Chậm',
                'book_id' => 2,
            ],
        ]);

        DB::table('book_parts')->insert([
            [
                'part_number' => 1,
                'part_title' => 'Phần 1: Khoảng thời gian Đại cương',
                'book_id' => 3,
            ],
            [
                'part_number' => 2,
                'part_title' => 'Phần 2: Cách mạng Đồ đá',
                'book_id' => 3,
            ],
            [
                'part_number' => 3,
                'part_title' => 'Phần 3: Lập trình Nông nghiệp',
                'book_id' => 3,
            ],
        ]);

        DB::table('book_parts')->insert([
            [
                'part_number' => 1,
                'part_title' => 'Phần 1: Mơ ước và Định mệnh',
                'book_id' => 4,
            ],
            [
                'part_number' => 2,
                'part_title' => 'Phần 2: Sự tìm kiếm của Santiago',
                'book_id' => 4,
            ],
        ]);

        DB::table('book_parts')->insert([
            [
                'part_number' => 1,
                'part_title' => 'Phần 1: Những ước mơ tiềm ẩn',
                'book_id' => 5,
            ],
            [
                'part_number' => 2,
                'part_title' => 'Phần 2: Tâm lý học và con người',
                'book_id' => 5,
            ],
        ]);

        DB::table('book_parts')->insert([
            [
                'part_number' => 1,
                'part_title' => 'Phần 1: Tự khởi động sức mạnh tiềm ẩn',
                'book_id' => 6,
            ],
            [
                'part_number' => 2,
                'part_title' => 'Phần 2: Lập kế hoạch thành công',
                'book_id' => 6,
            ],
        ]);

        DB::table('book_parts')->insert([
            [
                'part_number' => 1,
                'part_title' => 'Phần 1: Lập kế hoạch làm giàu',
                'book_id' => 7,
            ],
            [
                'part_number' => 2,
                'part_title' => 'Phần 2: Bí mật của thành công',
                'book_id' => 7,
            ],
        ]);

        DB::table('book_parts')->insert([
            [
                'part_number' => 1,
                'part_title' => 'Phần 1: Ngôn ngữ cơ thể trong giao tiếp',
                'book_id' => 8,
            ],
            [
                'part_number' => 2,
                'part_title' => 'Phần 2: Giải mã ngôn ngữ cơ thể',
                'book_id' => 8,
            ],
        ]);

        DB::table('book_parts')->insert([
            [
                'part_number' => 1,
                'part_title' => 'Phần 1: Khởi đầu với thói quen',
                'book_id' => 9,
            ],
            [
                'part_number' => 2,
                'part_title' => 'Phần 2: Xây dựng các thói quen hiệu quả',
                'book_id' => 9,
            ],
        ]);

        DB::table('book_parts')->insert([
            [
                'part_number' => 1,
                'part_title' => 'Phần 1: Khởi đầu với sự lựa chọn',
                'book_id' => 10,
            ],
            [
                'part_number' => 2,
                'part_title' => 'Phần 2: Xây dựng sự vĩ đại',
                'book_id' => 10,
            ],
        ]);
        
    }
}
