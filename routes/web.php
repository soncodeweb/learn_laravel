<?php

use App\Models\Post;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Định tuyến cơ bản

// Route::get("/post", function () {
//     return "Đây là trang bài viết";
// });

// Route::get("/admin/product", function () {
//     return "Trang quản lý sản phẩm";
// });

// Route::get("/admin/product/add", function () {
//     return route('product.add');
// })->name('product.add');

// Định tuyến có tham số
/*
// Route::get("/posts/{id}", function ($id) {
//     return $id;
// });

Route::get("/posts/{cat_id}/page/{page}", function ($cat_id, $page) {
    return $cat_id . '-' . $page;
});

// Đặt tên định tuyến
Route::get('users/profile', function () {
    return route("profile"); // http://localhost:81/learn-laravel/users/profile
})->name('profile');

Route::get("/admin/product/add", function () {
    return route('product.add');
})->name('product.add');

// Định tuyến có tham số tùy chọn
// domain.com/users => Hiện thị danh sách users
// domain.com/users/4 => Hiển thị ra thông tin chi tiết có id = 4

Route::get('users/{id?}', function ($id = 0) {
    return $id;
});
*/

// Định tuyến với tham số có ràng buộc biểu thức chính quy
/*
// Route::get('product/{id}', function ($id) {
//     return $id;
// })->where('id', '[0-9]+'); // ràng buộc 1 tham số với biểu thức chính quy

Route::get('product/{id}', function ($id) {
    return $id;
}); // ràng buộc 1 tham số với biểu thức chính quy ở phạm vi global ở file RouteServiceProvider.php fn root


Route::get('product/{slug}/{id}', function ($slug, $id) {
    return $slug . "-" . $id;
})->where(['slug' => '[A-Za-z0-9-_]+']); // ràng buộc 2 tham số với biểu thức chính quy

// Định tuyến qua 1 view: chỉ xử dụng khi quá trình xuất ra giao diện người dùng không cần xử lý
Route::view('/welcome', 'welcome');
// Route::view('/post', 'post', ['id' => 20]);
*/

// Example Route: Quản lý bài viết trong admin
/*
Route::get("admin/post/add", function () {
    return "Admin: Thêm bài viết";
});

Route::get("admin/post/update/{id}", function ($id) {
    return "Admin: Cập nhật bài viết với id = " . $id;
});

Route::get("admin/post/{id?}", function ($id = null) {
    if (!$id) {
        return "Admin: Danh sách các bài biết";
    } else {
        return "Admin: Chi tiết bài viết với id = " . $id;
    }
});

Route::get("admin/post/delete/{id}", function ($id) {
    return "Admin: Xóa bài với có id = " . $id;
}); */

// Định tuyến qua controller

// Route::get('/post/{id}', 'PostController@detail');

// Route::get('product/show/{id}', 'ProductController@show');
// Route::get('product/create', 'ProductController@create');
// Route::get('product/update/{id}', 'ProductController@update');


// Route::resource('drink', "DrinkController");


// Example Controller: Tạo controller quản lý bài viết trong admin và định tuyến đến nó

// Route::get("admin/post/create", "AdminPostController@create");

// Route::get("admin/post/update/{id}", "AdminPostController@update");

// Route::get("admin/post/{id}", "AdminPostController@show");

// Route::get("admin/post/delete/{id}", "AdminPostController@delete");

// VIEWS LARAVEL

// Route::get('post/index', "PostController@index");


// Xây dựng Views theo khu vực Module hệ thống

// Route::get('admin/post/show/{id}', "AdminPostController@show");

// Route::get('child', function () {
//     $users = array(
//         1 => array(
//             'name' => 'Lê Quang Son'
//         ),
//         2 => array(
//             'name' => 'Lê Quang Tuấn'
//         ),
//         3 => array(
//             'name' => 'Lê Quang Hải'
//         ),
//     );
//     return view('child', ['users' => $users]);
// });

// Route::get('demo', function () {

//     return view('demo');
// });

// Route::get(
//     'child',
//     function () {
//         return view("child", ['data' => 5, 'post_title' => 'Laravel PHP', 'users' => '']);
//     }
// );


// BÀI TẬP VIEWS
// Tạo view thực hiện các tác vụ xử lý bài viết trong admin
//  - Trang thêm bài viết
//  - Trang danh sách bài viết
//  - Trang cập nhật bài viết
//  Tên module: post


// Route::get('admin/create', "exAdminPostController@create");
// Route::get('admin/show/{id}', "exAdminPostController@show");
// Route::get('admin/update/{id}', "exAdminPostController@update");

// Route::get('users/insert', function () {
//     // bcrypt: mã hóa password thành 60 kí tự
//     DB::table('users')->insert(
//         ['name' => 'Tung Chen', 'email' => 'chentung@gmail.com']
//         // ['name' => 'Tung Chen'] // Field 'email' doesn't have a default value
//     );
// });

// Route::get('posts/add', "PostController@add");
// Route::get('posts/show', "PostController@show");
// Route::get('posts/update/{id}', "PostController@update");
// Route::get('posts/delete/{id}', "PostController@delete");

## BÀI TẬP QUERY BUILDER

// Route::get('admin/products/show/{id?}', "exAdminProductController@show");
// Route::get('admin/products/add', "exAdminProductController@add");
// Route::get('admin/products/update/{id?}', "exAdminProductController@update");
// Route::get('admin/products/delete/{id?}', "exAdminProductController@delete");

// ELOQUENT ORM

// Select
// Route::get('posts/read', function () {
//     $post = Post::all();
//     return $post;
// });

# Route PostController
// Route::get('posts/read', "PostController@read");
// Route::get('posts/add', "PostController@add");
// Route::get('posts/update/{id}', "PostController@update");
// Route::get('posts/delete/{id}', "PostController@delete");
// Route::get('posts/restore/{id}', "PostController@restore");
// Route::get('posts/permanentlyDelete/{id}', "PostController@permanentlyDelete");

# Route FeaturedImagesController
// Route::get('images/read/{id}', "FeaturedImagesController@read");

# Route RoleController

// Route::get('role/show', 'RoleController@show');

# FORM - VALIDATION FORM
Route::get('post/add', "PostController@add");
Route::post('post/store', "PostController@store");
Route::get('post/show', "PostController@show");

Route::get('user/register', function () {
    return view('user.register');
});
