# 🛒 LaraShop - Hệ Thống Website Thương Mại Điện Tử

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

---

## 📖 1. Giới Thiệu & Ngữ Cảnh Dự Án (Project Context)

**LaraShop** là ứng dụng web thương mại điện tử được xây dựng trên nền tảng **Laravel Framework** (phiên bản Laravel 11). Hệ thống cung cấp giải pháp toàn diện cho việc quản lý và vận hành cửa hàng bán lẻ trực tuyến, phục vụ cả hai nhóm đối tượng:

- **Khách hàng (Client):** Xem danh mục sản phẩm, tìm kiếm, lọc theo thương hiệu, quản lý giỏ hàng, đặt hàng trực tuyến và theo dõi tiến độ đơn hàng.
- **Quản trị viên (Admin):** Quản lý người dùng, phân loại danh mục, quản lý kho hàng và hãng sản xuất, tiếp nhận và cập nhật trạng thái đơn hàng từ lúc đặt đến lúc giao thành công.

---

## 🛠️ 2. Yêu Cầu Môi Trường (System Requirements)

Trước khi tiến hành cài đặt, máy chủ hoặc môi trường phát triển cục bộ (XAMPP, WampServer, Laragon hoặc Docker) cần đáp ứng các điều kiện sau:

- **PHP:** `>= 8.2` (Khuyến nghị PHP 8.2 hoặc 8.3)
  - *Các extension PHP bắt buộc:* `BCMath`, `Ctype`, `cURL`, `DOM`, `Fileinfo`, `JSON`, `Mbstring`, `OpenSSL`, `PCRE`, `PDO`, `pdo_mysql`, `Tokenizer`, `XML`.
- **Hệ quản trị CSDL:** MySQL `>= 8.0` hoặc MariaDB `>= 10.4`
- **Composer:** `>= 2.5`
- **Node.js & NPM:** Node `>= 18.x` và NPM `>= 9.x`
- **Web Server:** Apache hoặc Nginx

---

## 🚀 3. Hướng Dẫn Cài Đặt & Khởi Chạy (Installation & Setup)

Thực hiện tuần tự các bước dưới đây để thiết lập dự án trên máy cá nhân:

### Bước 1: Tải mã nguồn
```bash
git clone [https://github.com/dth235655-nguyentrunghieu/larashop_b1.git](https://github.com/dth235655-nguyentrunghieu/larashop_b1.git)
cd larashop_b1
# Cài đặt package PHP
composer install

# Cài đặt package Javascript / CSS
npm install

# Trên Linux / macOS:
cp .env.example .env

# Trên Windows Command Prompt:
copy .env.example .env
APP_NAME=LaraShop
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_TIMEZONE=Asia/Ho_Chi_Minh
APP_URL=[http://127.0.0.1:8000](http://127.0.0.1:8000)

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=larashop_db
DB_USERNAME=root
DB_PASSWORD=
# Tạo mã khóa bí mật cho ứng dụng
php artisan key:generate

# Tạo liên kết tượng trưng cho thư mục lưu trữ ảnh/tập tin tải lên
php artisan storage:link

# Chạy migration tạo cấu trúc bảng và nạp dữ liệu mẫu ban đầu
php artisan migrate --seed

php artisan serve

cấu trúc thư mục
larashop_b1/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/                        # Đăng nhập, đăng ký, quên/đặt lại mật khẩu
│   │   │   ├── Controller.php               # Base Controller
│   │   │   ├── DonHangController.php        # Xử lý đơn hàng
│   │   │   ├── DonHangChiTietController.php # Xử lý chi tiết mặt hàng trong đơn
│   │   │   ├── HangSanXuatController.php   # Quản lý hãng / nhãn hiệu
│   │   │   ├── HomeController.php           # Trang chủ & luồng mua sắm chính
│   │   │   ├── LoaiSanPhamController.php   # Quản lý danh mục hàng
│   │   │   ├── SanPhamController.php        # Quản lý thông tin & giá sản phẩm
│   │   │   ├── TinhTrangController.php     # Quản lý trạng thái xử lý đơn
│   │   │   └── UserController.php           # Quản lý tài khoản người dùng
│   └── Models/                              # Eloquent Models tương ứng với các bảng
│       ├── DonHang.php
│       ├── DonHang_ChiTiet.php
│       ├── HangSanXuat.php
│       ├── LoaiSanPham.php
│       ├── SanPham.php
│       ├── TinhTrang.php
│       └── User.php
├── bootstrap/                               # Khởi tạo ứng dụng & Providers (Laravel 11)
│   ├── app.php
│   └── providers.php
├── config/                                  # Các tập tin cấu hình hệ thống
├── database/
│   ├── factories/                           # Factory tạo dữ liệu giả lập
│   ├── migrations/                          # Định nghĩa cấu trúc các bảng CSDL
│   └── seeders/                             # Script tạo dữ liệu mẫu ban đầu
├── lang/                                    # Đa ngôn ngữ (Localization)
│   ├── en/                                  # Ngôn ngữ Tiếng Anh
│   └── vi/                                  # Ngôn ngữ Tiếng Việt (Validation, Auth,...)
├── public/                                  # Thư mục gốc Web Server (Index, Assets, CSS/JS)
│   └── vendor/font-awesome/                 # Thư viện icon Font Awesome
├── resources/                               # Views (Blade templates), CSS và JS thô
├── routes/                                  # Khai báo định tuyến (web.php, console.php)
├── storage/                                 # Lưu trữ logs, cache và uploads từ người dùng
├── .env.example                             # File cấu hình môi trường mẫu
├── composer.json                            # Danh sách gói thư viện PHP
└── package.json                             # Danh sách gói thư viện Javascript/CSS

cơ sở dữ liệu

[users] 1 ────────────< N [don_hangs] N >──────────── 1 [tinh_trangs]
                                │
                                1
                                │
                                ∨
                       N [don_hang__chi_tiets]
                                ∧
                                │
                                N
                                │
[loai_san_phams] 1 ──< N [san_phams] N >── 1 [hang_san_xuats]

Chi tiết các bảng nghiệp vụ chính:
users: Quản lý thông tin tài khoản, mật khẩu, phân quyền quản trị/khách hàng.

loai_san_phams: Danh mục nhóm sản phẩm (Điện thoại, Laptop, Phụ kiện,...).

hang_san_xuats: Thương hiệu nhà cung cấp (Apple, Samsung, Sony,...).

san_phams: Chi tiết sản phẩm, đơn giá, số lượng tồn kho, hình ảnh và mô tả.

tinh_trangs: Trạng thái đơn hàng (Đang chờ xử lý, Đang đóng gói, Đang giao, Đã hủy,...).

don_hangs: Hóa đơn mua hàng tổng thể, thông tin khách hàng và địa chỉ giao nhận.

don_hang__chi_tiets: Danh sách từng mặt hàng, số lượng và đơn giá tại thời điểm đặt hàng.
