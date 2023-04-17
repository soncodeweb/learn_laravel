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

```php
   $post = DB::table('posts')->where('user_id', 3)->get();
   $post = DB::table('posts')->where('user_id', '>', 3)->get(); // >,<
   $post = DB::table('posts')->where('title', 'like', "%iphone%")->get(); // like
```

## PHƯƠNG THỨC WHERE (KẾT HỢP) LẤY DỮ LIỆU NHIỀU BẢNG QUERY BUILDER

```php
// AND
   $post = DB::table('posts')->where([
      ['user_id', 3],
      ['id',1]
   ])->get();
// OR
   $post = DB::table('posts')->where(
            'user_id',
            3
        )->orWhere('id', 1)->get();
```

## GROUP BY - QUERY BUILDER

```php
   $posts = DB::table('posts')->selectRaw('count(id) as number_post, user_id')->groupBy('user_id')->get();
```

## ORDER BY - QUERY BUILDER (Sắp xếp theo thứ tự nào đó)

```php
   $posts = DB::table('posts')->orderBy('user_id')->get(); // Sắp xếp tăng dần
   $posts = DB::table('posts')->orderBy('user_id','desc')->get(); // Sắp xếp giảm dần
```

## LIMIT OFFSET - QUERY BUILDER (Lấy số lượng bản ghi nhất định)

```php
   $post = DB::table('posts')->limit(3)->get(); // lấy bản ghi giới hạn bằng 3

      $post = DB::table('posts')->offset(2)->limit(3)->get(); // lấy bản ghi giới hạn bằng 3 loại 2 phần tử đầu tiên
```

## UPDATE - QUERY BUILDER

```php

   DB::table('posts')->where('id', 2)->update([
      'title' => 'Update Laravel'
   ])

```

## BÀI TẬP QUERY BUILDER

Sử dụng query builder thực hiện các tác vụ module product

-   Thêm sản phẩm
-   Select sản phẩm
-   Cập nhật sản phẩm
-   Xóa sản phẩm
    Tất cả thực hiện trên ProductController

# ELOQUENT ORM

Lấy dữ liệu bản ghi
Query Builder: $posts = DB::table('posts')->get();
Eloquent ORM: $posts = App/Post::all()

Select, Insert, Update, Delete, Where

## TẠO MODEL - ELOQUENT ORM

_Cú pháp_
C1: `php artisan make:model Post`
C2: `php artisan make:model Post -m` // Tạo cả model và migration

1. SELECT
   Cú pháp: `Post::all()`

    EX:

    ```php
        $post = Post::all();
         return $post;
    ```

2. SELECT + WHERE
   Cú pháp: `Post::where('user_id', 3)->get()`
   EX:
    ```php
        $post = Post::where('user_id', 3)->get();
        return $post;
    ```
3. SELECT FIRST
   Cú pháp: `Post::where('user_id', 3)->first()`
   EX:
    ```php
        $post = Post::where('user_id', 3)->first();
        return $post;
    ```
4. FIND
   Cú pháp: `Post::find(2)`
   EX:
    ```php
        $post = Post::find(2);
        return $post;
    ```
5. FIND LIST
   Cú pháp: `Post::find([1,2])`
   EX:
    ```php
        $posts = Post::find([1,2]);
        return $posts;
    ```
6. ORDER BY
   Cú pháp: `Post::orderBy('user_id')->get()` // tăng dần
   Cú pháp: `Post::orderBy('user_id', 'desc')->get()` // giảm dần
   EX:
    ```php
        $posts = Post::orderBy('user_id');
        return $posts;
    ```
7. GROUP BY
   Cú pháp: `Post::selectRaw("count('id') as number_posts, user_id")->groupBy('user_id')->orderBy('number_posts', 'desc')->get()`

    EX:

    ```php
        $posts = Post::selectRaw("count('id') as number_posts, user_id")->groupBy('user_id')->orderBy('number_posts', 'desc')->get();
        return $posts;
    ```

8. LIMIT OFFSET
   Cú pháp: `Post::limit(2)->get()` // Lấy giới hạn 2 bản ghi
   Cú pháp: `Post::limit(2)->offset(2)->get()` // Lấy giới hạn 2 bản ghi và loại bỏ 2 bản ghi đầu tiên

    EX:

    ```php
        $posts = Post::limit(2)->get();
        return $posts;
    ```

9. INSERT_SAVE
   Cú pháp: `$post->save()`

    EX:

    ```php
        $post = new Post;
        $post->title = 'NodeJs';
        $post->content = 'content NodeJs ,...';
        $post->user_id = 1;

        $post->save();
    ```

10. UPDATE_SAVE
    Cú pháp: `$post->save()`

    EX:

    ```php
        $post = Post::find($id);
        $post->title = 'NodeJs Update';
        $post->content = 'content NodeJs Update ,...';
        $post->save();
    ```

11. INSERT_CREATE
    Cú pháp:

```php
   Post::create([
      'title'=>'Create',
      'content'=>'Content create',
      'user_id'=>3
   ])
```

12. UPDATE
    Cú pháp:

```php
   $post = Post::where('id', $id)->update([
         'title' => 'UPDATE',
         'content' => 'CONTENT UPDATE',
         'user_id' => 3
      ]);
```

13. DELETE
    Cú pháp:

```php
  $post = Post::find($id)->delete();
```

14. DELETE - WHERE
    Cú pháp:

```php
   $post = Post::where('user_id', $id)->delete();
```

15. DESTROY
    Cú pháp:

```php
    Post::destroy(1); // Xóa bản ghi theo id
    Post::destroy(16,17); // C1:Xóa danh sách bản ghi theo id và trả về số lượng bản ghi được xóa
    Post::destroy([16,17]); //  C2:Xóa danh sách bản ghi theo id và trả về số lượng bản ghi được xóa
```

## SOFT DELETE CONFIG

    Lợi ích:

    -   Xóa dữ liệu tạm thời cho vào thùng rác tránh xóa nhầm
    -   Có thể khôi phục lại dữ liệu đã xóa trước đó
    -   Xuất danh sách bản ghi bao gồm đã xóa tạm thời
    -   Hỗ trợ chương trình xóa vĩnh viển

    Cấu hình:

    -   Bước 1: Tạo CSDL softdelete qua migration
    -   Bước 2: Khai báo sortdelete tạo Model

1. SOFTDELETE_TRASH

    - Dùng những cách xóa thông thường, nó chỉ xóa tạm thời và thêm thời gian vào `deleted_at`

2. SOFTDELETE_SELECT
   TH1: Lấy danh sách bản ghi chưa được xóa tạm thời

    ```php
        $posts = Post::withoutTrashed()->get();
        return $posts;
    ```

    TH2: Lấy toàn bộ danh sách bản ghi

    ```php
        $posts = Post::withTrashed()->get();
        return $posts;
    ```

    TH3: Lấy danh sách bản ghi đã được xóa tạm thời

    ```php
        $posts = Post::onlyTrashed()->get();
        return $posts;
    ```

3. SOFTDELETE_RESTORE

    ```php
    $post = Post::onlyTrashed()->where('id', $id)->restore();
    ```

4. SOFTDELETE_FORCEDELETE // xóa vĩnh viễn bản ghi

    ```php
    Post::onlyTrashed()->where('id', $id)->forceDelete()
    ```

## RELATIONSHIP

-   One To One
-   One To Many
-   Many To Many

1.  ONE TO ONE
    _CẤU HÌNH_: Tạo mối quan hệ ONE TO ONE giữa bảng `Post` và `FeaturedImages`

    -   Model `Post`:

    ```php
    function FeaturedImages()
          {
                return $this->hasOne('App\Models\FeaturedImages');
          }
    ```

    -   Model `FeaturedImages`:

    ```php
    function post()
          {
             return $this->belongsTo('App\Models\Post');
          }
    ```

    _SELECT_:

    -   Lấy thông tin bản `Post` thông qua bản `FeaturedImages`
        ```php
            $post = FeaturedImages::find($id)->post;
            return $post;
        ```
    -   Lấy thông tin bản `FeaturedImages` thông qua bản `Post`
        ```php
            $img = Post::find(4)->FeaturedImages;
            return $img;
        ```

2.  ONE TO MANY
    _CẤU HÌNH_: Tạo mối quan hệ ONE TO MANY giữa bảng `Users` và `Posts`

    -   Model `User`:

    ```php
    function post()
          {
                return $this->hasMany('App\Models\Post');
          }
    ```

    -   Model `Post`:

    ```php
    function user()
          {
             return $this->belongsTo('App\Models\User');
          }
    ```

    _SELECT_:

    -   Lấy thông tin bản `User` thông qua model `Post`
        ```php
            $user = Post::find($id)->user;
            return $user;
        ```
    -   Lấy thông tin bản `Post` thông qua model `User`
        ```php
            $posts = User::find($id)->posts;
            return $posts;
        ```

3.  MANY TO MANY
    _CẤU HÌNH_: Tạo mối quan hệ MANY TO MANY giữa bảng `Roles` và `User`

    -   Model `User`:

    ```php
    function roles()
          {
                return $this->belongsToMany('App\Models\Role');
          }
    ```

    -   Model `Role`:

    ```php
    function users()
          {
             return $this->belongsTo('App\Models\User');
          }
    ```

    _SELECT_:

    -   Lấy thông tin bản `User` thông qua model `Post`
        ```php
            $user = Post::find($id)->user;
            return $user;
        ```
    -   Lấy thông tin bản `Post` thông qua model `User`
        ```php
            $posts = User::find($id)->posts;
            return $posts;
        ```

# FORM - VALIDATION FORM

-   Các phần tử form phổ biến + input text + label + textarea + input email + input password + input number + input date + checkbox, radiobox + selectbox + submit + button
    _Vị trí xây dựng form: Views_

## FORM BASIC, BOOTSTRAP AND LARAVELCOLLECTIVE

## VALIDATION

Là thao tác chuẩn hóa dữ liệu form trước khi bước vào xử lý những giai đoạn tiếp theo của dự án. Nó được coi là bộ lọc và đảm bảo nhận được dữ liệu theo định dạng mong muốn. - Kiểm tra dữ liệu rỗng - Kiểm tra độ dài dữ liệu - Kiểm tra định dạng theo biểu thức chính quy - Kiểm tra dữ liệu trùng

1. Validate

```php
       $request->validate(
            [
                'title' => 'required',
                'content' => 'required'
            ]
        );
```

2. Validate showerror

```php
   Kiểm tra xem có bất kì lỗi nào hay không
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    Danh sách các lỗi
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
```

3. Validate error field

```php
    @error('content')
        <small class="form-text text-danger">{{$message}}</small>
    @enderror
```

4. Validate custom error

```php
    $request->validate(
            [
                'title' => 'required',
                'content' => 'required'
            ],
            [
                'required' => ':attribute không được để trống!'
            ],
            [
                'title' => 'tiêu đề',
                'content' => 'nội dung'
            ]
        ); // dữ liệu phải tồn tại
```

5. Validate Rules
   _Quy tắc_-----------------------------------_Chú thích_
   `required` --------------------------------Không được để trống dữ liệu
   `email` -----------------------------------Yêu cầu nhập theo định dạng email 'user_email' => 'email'.
   `integer` ---------------------------------Dữ liệu nhập số nguyên 'price'=>'interger'
   `confirmed` -------------------------------Kiểm tra dữ liệu trùng nhau (mật khẩu) 're_password' =>'password_confirmation'
   `max:value` -------------------------------Độ dài lớn nhất dữ liệu nhập vào, 'title' => 'max:100'
   `min:value` -------------------------------Độ dài bé nhất dữ liệu nhập vào, 'title' => 'min:3'
   `unique:table` ----------------------------Dữ liệu nhập vào phải duy nhất trong bảng, 'username' => 'unique:users'
   `int:a,b` ---------------------------------Dữ liệu nhập vào nằm trong danh sách a,b, 'status' =>'in:publish,private'
   `regex` -----------------------------------Dữ liệu nhập vào theo định dạnh biểu thức chính quy, 'username' => 'regex:/^([a-zA-Z]+)S/'
   `file` ------------------------------------Dữ liệu nhập vào dạng file
   `image` -----------------------------------Dữ liệu nhập vào phải là file ảnh (jpeg, png, bmp, gif,...)
