# LUỒNG XỬ LÝ MVC TRONG LARAVEL

1.  Routing: Định tuyến
2.  Controller: Trung tâm điều khiển xử lý
3.  Model: Phụ trách làm việc với database
4.  View: Thiết lập trang hiển thị cho người dùng trên trình duyệt

# MỘT SỐ FILE/THƯ MỤC QUAN TRỌNG LARAVEL

1. Routing
   routes/web.php

2. Controller
   app/Http/Controllers/

3. Model
   app/

4. View
   resources/views/

5. Cấu hình hệ thống
   config/

6. Tạo database
   database/migrations

7. Cấu hình kết nối database/email
   .env

# TÁC VỤ LIÊN QUAN ĐẾN CONTROLLER

1.  Tạo controller bằng mã lệnh // php artisan make:controller NameController ; có sẵn các function: php artisan make:controller DrinkController --resource
2.  Gọi controller từ route
3.  Gọi controller có tham số từ url
4.  Gọi view trong controller
5.  Gửi dữ liệu sang view từ controller
6.  Làm việc với Model
    ...

-- Chuyển hướng trang: `redirect('drink')`

# VIEWS LARAVEL

Quản lý việc hiển thị của ứng dụng web ra phía người dùng
Nội dung:

-   Tạo view
-   Gửi dữ liệu sang view
-   Tạo view kiểu master layout
-   Cấu trúc câu lệnh trên blade template
-   Kế thừa layout
-   Một số phần nâng cao khác

# BLADE TEMPLATE - MASTER LAYOUT

-   Giao diện có bộ khung chung cho website
-   Những khu vực có nội dung thay đổi sẽ được gọi dữ liệu phù hợp trong từng tác vụ
-   Tách biệt code HTML ccs và PHP
-   File có đuôi mở rộng \*.blade.php
-   Giao diện có tính kế thừa, không cần phải include file php như thông thường
-   Các tháo tác php trên blade template có cú pháp riêng

1. HIỂN THỊ DỮ LIỆU TRÊN BLADE TEMPLATE

{{$data}}: Hiển thị dữ liệu data đã qua bộ lọc htmlspecialchars()
{!! $data !!}: Hiển thị cấu trúc dữ liệu có định dạng html

2. CÚ PHÁP CẤU TRÚC IF TRÊN BLADE

```php
   @if ($data % 2 == 0)
      // code here
   @endif
```

3. CÚ PHÁP VÒNG LẶP FOR

```php
  @for($i = 0, $i < 10, $i++)
   The current value is {{$i}}
   @endfor
```

4. CÚ PHÁP VÒNG LẶP FOR

```php
 @foreach ($users as $user)
   <p>This is user {{$user['name']}}</p>
 @endforeach
```

5. ĐỊNH NGHĨA MỘT KHỐI PHP TRÊN BLADE

```php
   @php
   @endphp
```

6. INCLUDE VIEWS TRONG BLADE

```php
   @include('name')
   @include('name', data)
```

7. ISSET, EMPTY TRÊN BLADE TEMPLATE

```php
   @isset($records)
      // $records is defined and is not null
   @endisset

   @empty($records)
      // $records is "empty"
   @endempty
```

# MIGRATION LÀ GÌ?

-   Công cụ giúp thiết kế database thông qua các dòng lệnh
-   Có thể lưu lại lịch sử các lần tương tác trên CSDL từ đó dễ dàng backup nếu cần
-   Cú pháp tạo các trường dữ liệu đơn giản dễ hiểu
-   Rất hữu ít cho làm việc nhóm
-   Dễ dàng chia sẽ database cho người khác khi cần

1. Tạo cấu trúc bảng qua migration
   Cú pháp: `php artisan make:migration create_posts_table`
2. Kích hoạt migration để tạo bảng
   Cú pháp: `php artisan migrate`

3. MIGRATE:ROLLBACK

-   Khôi phục lệnh tạo bảng ở bước trước
    Cú pháp: `php artisan migrate:rollback`
-   Khôi phục lại cơ sở dữ liệu ở bước cụ thể
    Cú pháp: `php artisan migrate:rollback --step=5`

4. MIGRATE:RESET - MIGRATE:REFRESH

-   Chạy toàn bộ migrate (tất cả các bảng đều có batch = 1)
    Cú pháp: `php artisan migrate:refresh`
-   Reset toàn bộ thao tác trên Migrate (xóa toàn bộ bảng)
    Cú pháp: `php artisan migrate:reset`

5. Thêm mới cột vào một bảng đã tồn tại
   Cú pháp: `php artisan make:migration add_gender_to_users_table --table=users`

6. Tạo các trường dữ liệu của table với migration
   _Cú pháp_ _Mô tả_
   `$table->id()`------------------------------------------ Tương đương `$table->bigIncrements('id')`
   `$table->foreinId('user_id')`--------------------------- Tương đương `$table->unsignedBigInteger('user_id')`
   `$table->bigIncrements('id')`--------------------------- Trường tự động tăng UNSIGNED BIGINT, được thiết lập khóa chính
   `$table->increments('id')`------------------------------ Trường tự động tăng UNSIGNED INT, được thiết lập khóa chính  
   `$table->string('name',100)`---------------------------- Thiết lập trường với kiểu dữ liệu VARCHAR với độ dài xác định
   `$table->text('description')`--------------------------- Tạo ra dữ liệu kiểu TEXT để chứa chi tiết nội dung, số lượng ký tự lớn
   `$table->json('options')`------------------------------- Trường dữ liệu kiểu json {'k1':'value','k2':'value'}
   `$table->timestamps(0)`--------------------------------- Tạo 2 trường created_at và update_at
   `$table->enum('level',['easy','hard'])`----------------- Tạo trường bao gồm tập hợp giá trị cho trước
   `$table->char('name',100)`------------------------------ Trường lưu chuỗi ngắn  
   `$table->boolean('comfirmed')`-------------------------- Lưu trữ dự liệu có 2 giá trị true, false
   `$table->float('amount', 8,2)`-------------------------- Lưu trữ dữ liệu FLOAT
   `$table->integer('votes')`------------------------------ Lưu trữ dữ liệu INT
   `$table->dateTime('created_at', 0)`--------------------- Lưu trữ dữ liệu thời gian '0000-00-00 00:00:00'

## Note

`nullable`: cho phép null
`unique`: dữ liệu các column không được trùng

7. Phương thức phụ khi tạo/cập nhật bảng
   _Cú pháp_ _Mô tả_
   `->after('column)`-------------------------------------- Thêm trường mới đằng sau một cột cho trước
   `->autoIncrement()`------------------------------------- Thiết lập INTERGER và tự động tăng(khóa chính)
   `->nullable($value = true)`----------------------------- Khai báo cho phép cột có thể `NULL`
   `->unsigned()`------------------------------------------ Thiết lập một số nguyên không dấu
   `->useCurrent`------------------------------------------ Lưu dữ liệu cho cột chính là mốc thời gian hiện tại
   `->default($value)`------------------------------------- Thiết lập giá trị mặc định cho một trường

8. Thiết lập khóa ngoại cho bảng với MIGRATION
   _Cú pháp_

```php
Schema:table('post', function (Blueprint $table){
   $table->unsignedBigInteger('user_id');
   $table->foreign('user_id')->references('id')->on('users')
})
```

_Quy tắc xóa dữ liệu bảng kết nối_

```php
Schema:table('post', function (Blueprint $table){
   $table->foreignId('user_id')->constrained->onDelete('cascade');
})
```

## BÀI TẬP MIGRATION

Sử dụng migration tạo ra bẳng products bao gồm những trường:

-   id
-   name
-   content
-   price
-   product_cat_id
-   user_id
-   created_at
-   update_at

# TỔNG QUAN QUERY BUILDER LARAVEL

(insert, select, update, delete, where, join, order by, group by, count,...)

## INSERT DỮ LIỆU - QUERY BUILDED

```php
   use Illuminate\Support\Facades\DB;

   DB::table('user')->insert(
      ['email'=>'quangson@gmail.com', 'username' =>'quangson']
   )

    DB::table('user')->insert(
     [
       ['email'=>'quangson@gmail.com', 'username' =>'quangson']
        ['email'=>'taipro@gmail.com', 'username' =>'taipro']
     ]
   )
```

## SELECT DỮ LIỆU - QUERY BUILDED

```php
Lấy danh sách bản ghi
$post = DB::table('posts')->get() // lấy toàn bộ
$posts = DB::table('posts')->select('title', 'content')->get(); //lấy toàn bộ hàng nhưng chỉ lấy cột title và content
$posts = DB::table('posts')->select('title', 'content')->first(); // lấy bản ghi đầu tiên
$posts = DB::table('posts')->where('id', 2)->first(); // lấy bản ghi đầu tiên khi điều kiện đúng
$post = DB::table('posts')->find(2); // lấy bản ghi dựa vào id
```

## COUNT - QUERY BUILDED (Đến số bản ghi)

```php
Lấy danh sách bản ghi
$number_posts = DB::table('posts')->count();
```

## MIN/MAX/AVG - QUERY BUILDED

```php
   DB::table('posts')->max('user_id') // Lấy giá trị lớn nhất
   DB::table('posts')->min('user_id') // Lấy giá trị nhỏ nhất
   DB::table('posts')->avg('user_id') // Lấy giá trị trung tình
```

## PHƯƠNG THỨC JOIN LẤY DỮ LIỆU NHIỀU BẢNG QUERY BUILDER

```php
    $post = DB::table('posts')->join('users', 'users.id', '=', 'posts.user_id')->select('users.*', 'posts.title')->get();
   .* : Lấy toàn bộ các cột của bản ghi users
```

## PHƯƠNG THỨC WHERE LẤY DỮ LIỆU NHIỀU BẢNG QUERY BUILDER
