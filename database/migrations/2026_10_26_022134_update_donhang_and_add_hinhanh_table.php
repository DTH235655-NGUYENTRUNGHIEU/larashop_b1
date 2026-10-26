<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Cập nhật bảng donhang
        Schema::table('donhang', function (Blueprint $table) {
            $table->text('ghichu')->nullable()->after('diachigiaohang');
            $table->tinyInteger('phuongthucthanhtoan')->default(1)->comment('1: COD, 2: ChuyenKhoan')->after('ghichu');
            $table->boolean('trangthaithanhtoan')->default(0)->comment('0: Chua, 1: Da thanh toan')->after('phuongthucthanhtoan');
            $table->decimal('tongtien', 12, 2)->default(0)->after('trangthaithanhtoan');
        });

        // 2. Tạo bảng album ảnh sản phẩm (nếu muốn hiển thị nhiều ảnh)
        Schema::create('hinhanh_sanpham', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sanpham_id')->constrained('sanpham')->onDelete('cascade');
            $table->string('hinhanh');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hinhanh_sanpham');

        Schema::table('donhang', function (Blueprint $table) {
            $table->dropColumn(['ghichu', 'phuongthucthanhtoan', 'trangthaithanhtoan', 'tongtien']);
        });
    }
};