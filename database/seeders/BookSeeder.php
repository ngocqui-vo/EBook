<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Đắc Nhân Tâm',
                'price' => 13000,
                'view_count' => 5,
                'description' => 'Cuốn sách nổi tiếng của Dale Carnegie về kỹ năng giao tiếp và quan hệ con người.',
                'image' => 'books/dac-nhan-tam.jpg',
                'published_date' => '1936-10-12',
                'category_id' => 1,
                'author_id' => 1
            ],
            [
                'title' => 'Tư Duy Nhanh Và Chậm',
                'price' => 25000,
                'view_count' => 8,
                'description' => 'Cuốn sách của Daniel Kahneman về hai chế độ tư duy của não bộ.',
                'image' => 'books/tu-duy-nhanh-va-cham.jpg',
                'published_date' => '2011-10-25',
                'category_id' => 2,
                'author_id' => 2
            ],
            [
                'title' => 'Sapiens: Lược Sử Loài Người',
                'price' => 39000,
                'view_count' => 12,
                'description' => 'Cuốn sách của Yuval Noah Harari về lịch sử phát triển của loài người.',
                'image' => 'books/sapiens-luoc-su-loai-nguoi.jpg',
                'published_date' => '2011-02-10',
                'category_id' => 3,
                'author_id' => 3
            ],
            [
                'title' => 'Nhà Giả Kim',
                'price' => 18000,
                'view_count' => 6,
                'description' => 'Cuốn tiểu thuyết của Paulo Coelho về cuộc phiêu lưu tìm kiếm ý nghĩa cuộc đời.',
                'image' => 'books/nha-gia-kim.jpg',
                'published_date' => '1988-01-01',
                'category_id' => 4,
                'author_id' => 4
            ],
            [
                'title' => 'Tâm Lý Học Hài Hước',
                'price' => 22000,
                'view_count' => 9,
                'description' => 'Cuốn sách của Sigmund Freud về tâm lý học và những ứng dụng trong cuộc sống hàng ngày.',
                'image' => 'books/tam-ly-hoc-hai-huoc.jpg',
                'published_date' => '1905-01-01',
                'category_id' => 2,
                'author_id' => 5
            ],
            [
                'title' => 'Đánh Thức Con Người Phi Thường Trong Bạn',
                'price' => 32000,
                'view_count' => 10,
                'description' => 'Cuốn sách của Anthony Robbins về phát triển bản thân và đạt được thành công.',
                'image' => 'books/danh-thuc-con-nguoi-phi-thuong-trong-ban.jpg',
                'published_date' => '1991-11-01',
                'category_id' => 1,
                'author_id' => 6
            ],
            [
                'title' => 'Giàu Có Đâu Có Khó',
                'price' => 28000,
                'view_count' => 7,
                'description' => 'Cuốn sách của Napoleon Hill về bí quyết thành công và làm giàu.',
                'image' => 'books/giau-co-dau-co-kho.jpg',
                'published_date' => '1937-01-01',
                'category_id' => 4,
                'author_id' => 1
            ],
            [
                'title' => 'Bí Mật Của Ngôn Ngữ Cơ Thể',
                'price' => 26000,
                'view_count' => 6,
                'description' => 'Cuốn sách của Allan Pease về bí mật của ngôn ngữ cơ thể và giao tiếp hiệu quả.',
                'image' => 'books/bi-mat-cua-ngon-ngu-co-the.jpg',
                'published_date' => '1981-01-01',
                'category_id' => 5,
                'author_id' => 2
            ],
            [
                'title' => 'Thói Quen Thứ 7',
                'price' => 30000,
                'view_count' => 11,
                'description' => 'Cuốn sách của Stephen R. Covey về tầm quan trọng của các thói quen trong cuộc sống.',
                'image' => 'books/thoi-quen-thu-7.jpg',
                'published_date' => '1989-01-01',
                'category_id' => 3,
                'author_id' => 3
            ],
            [
                'title' => 'Từ Tốt Đến Vĩ Đại',
                'price' => 35000,
                'view_count' => 8,
                'description' => 'Cuốn sách của Jim Collins về các yếu tố làm nên sự vĩ đại của một tổ chức.',
                'image' => 'books/tu-tot-den-vi-dai.jpg',
                'published_date' => '2001-10-16',
                'category_id' => 1,
                'author_id' => 4
            ]
        ]);

    }
}
