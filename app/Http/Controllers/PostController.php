<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    public function detail($id)
    {
        echo $id;
    }
    public function index()
    {
        return view("post");
    }

    public function add()
    {

        // QUERY BUILDER
        // DB::table('posts')->insert(
        //     ['title' => 'Laravel PHP', 'content' => 'content Laravel PHP', 'user_id' => 1]
        // );


        # ELOQUENT ORM - INSERT_SAVE
        // $post = new Post;
        // $post->title = 'NodeJs';
        // $post->content = 'content NodeJs ,...';
        // $post->user_id = 1;

        // $post->save();

        # INSERT_SAVE
        // Post::create([
        //     'title' => 'Create',
        //     'content' => 'Content create',
        //     'user_id' => 3
        // ]);

        # FORM - VALIDATION FORM

        return view('posts.create');
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required'
            ],
            // Validate custom error
            [
                'required' => ':attribute không được để trống!'
            ],
            [
                'title' => 'tiêu đề',
                'content' => 'nội dung'
            ]
        ); // dữ liệu phải tồn tại

        $input = $request->all();

        if ($request->hasFile('file')) {
            $file = $request->file;
            // Lấy tên file
            $filename =  $file->getClientOriginalName();
            // echo "<br>";
            // Lấy duôi file
            // echo $file->getClientOriginalExtension();
            // echo "<br>";
            // Lấy kích thước file
            // echo $file->getSize();
            // echo "<br>";

            $path = $file->move('public/uploads', $file->getClientOriginalName());
            $thumbnail = 'public/uploads/' . $filename;
            $input['thumbnail'] = $thumbnail;
        }
        $input['user_id'] = 3;
        // return $input;
        Post::create($input);
        // Phương thức lấy ra những dự liệu vừa submit lên
        // return $request->input(); 
    }

    public function show()
    {
        #  SELECT DỮ LIỆU - QUERY BUILDED
        // $posts = DB::table('posts')->where('id', 2)->first();
        // foreach ($posts as $post) {
        //     echo $post->title;
        //     echo "<br>";
        // }

        #  MIN/MAX/AVG - QUERY BUILDED
        // $posts = DB::table('posts')->where('user_id', 3)->count();
        // $min = DB::table('posts')->min('user_id');
        // $max = DB::table('posts')->max('user_id');
        // $avg = DB::table('posts')->avg('user_id');
        // return $avg;

        #  PHƯƠNG THỨC JOIN LẤY DỮ LIỆU NHIỀU BẢNG QUERY BUILDER
        // $posts = DB::table('posts')->join('users', 'users.id', '=', 'posts.user_id')->select('users.*', 'posts.title')->get();

        #  PHƯƠNG THỨC WHERE LẤY DỮ LIỆU NHIỀU BẢNG QUERY BUILDER
        // $post = DB::table('posts')->where('user_id', '>', 3)->get();

        #  THIẾT LẬP ĐIỀU KIỆN KẾT HỢP(AND, OR)
        // AND
        // $posts = DB::table('posts')->where(
        //     [
        //         ['user_id', 3],
        //         ['id', 1]
        //     ]
        // )->get();

        // // OR
        // $posts = DB::table('posts')->where(
        //     'user_id',
        //     3
        // )->orWhere('id', 1)->get();

        #  GROUP BY
        // $posts = DB::table('posts')->selectRaw('count(id) as number_post, user_id')->groupBy('user_id')->get();

        #  ORDER BY
        // $posts = DB::table('posts')->orderBy('user_id')->get(); // tăng dần

        // $posts = DB::table('posts')->orderBy('user_id', 'desc')->get(); // tăng dần

        #  LIMIT

        // $posts = DB::table('posts')->limit(3)->get();
        // $posts = DB::table('posts')->offset(2)->limit(3)->get();



        // return $posts;

        // SHOW DATA FILE
        $posts = Post::all();
        return view('posts.show', compact('posts'));
    }

    public function update(int $id)
    {
        # QUERY BUILDER UPDATE 

        // DB::table('posts')->where('id', 2)->update([
        //     'title' => 'Update Laravel PHP'
        // ]);

        // DB::table('posts')->where('id', $id)->update([
        //     'title' => 'Update NEW REACTJS'
        // ]);

        #  ELOQUENT ORM - UPDATE_SAVE

        // $post = Post::find($id);
        // $post->title = 'NodeJs Update';
        // $post->content = 'content NodeJs Update ,...';
        // $post->save();

        #  ELOQUENT ORM - UPDATE
        $post = Post::where('id', $id)->update([
            'title' => 'UPDATE',
            'content' => 'CONTENT UPDATE',
            'user_id' => 3
        ]);
    }

    public function delete(int $id)
    {

        # QUERY BUILDER - DELETE
        // DB::table('posts')->where('id', $id)->delete();
        # ELOQUENT - DELETE
        // $post = Post::find($id)->delete();
        # ELOQUENT - DELETE WHERE
        // $post = Post::where('user_id', $id)->delete();
        # ELOQUENT - DELETE DESTROY
        Post::destroy($id);
        // return Post::destroy([8, 9]); // xóa danh sách bản ghi theo id và trả về số lượng bản ghi được xóa

    }

    public function read()
    {
        // SELECT
        // $post = Post::all();

        // SELECT + WHERE
        // $posts = Post::where('user_id', 3)->get();
        // $posts = Post::where('title', 'like', '%PHP%')->get();
        // return $posts;

        // SELECT FIRST
        // $post = Post::where('user_id', 3)->first();
        // return $post;


        // FIND
        // $post = Post::find(4);
        // return $post;

        // FIND LIST
        // $posts = Post::find([1, 2]);
        // return $posts;

        // ORDER BY
        // $posts = Post::orderBy('user_id', 'desc')->get();
        // return $posts;

        // GROUP BY
        // $posts = Post::selectRaw("count('id') as number_posts, user_id")->groupBy('user_id')->orderBy('number_posts', 'desc')->get();
        // return $posts;

        // LIMIT + OFFSET(Loại bỏ những bản ghi đầu tiên)
        // $posts = POST::offset(2)->limit(2)->get();
        // return $posts;

        # SOFT DELETE - SELECT ALL
        // $posts = Post::withTrashed()->get();
        // return $posts;
        # SOFT DELETE - SELECT UNDELETED RECORDS
        // $posts = Post::withoutTrashed()->get();
        // return $posts;
        # SOFT DELETE - SELECT DELETED RECORDS
        // $posts = Post::onlyTrashed()->get();
        // return $posts;

        # ELOQUENT ORM - SELECT ONE TO ONE
        // $img = Post::find(4)->FeaturedImages;
        // return $img;

        # ELOQUENT ORM - SELECT ONE TO MANY
        // $user = Post::find(11)->user; // lấy thông tin user của bài viết có id = 11
        // return $user;
        $posts = User::find(4)->posts; // lấy thông tin posts của user có id = 1
        return $posts;
    }

    public function restore(int $id)
    {
        Post::onlyTrashed()->where('id', $id)->restore();
    }

    public function permanentlyDelete(int $id)
    {
        Post::onlyTrashed()->where('id', $id)->forceDelete();
    }
}
