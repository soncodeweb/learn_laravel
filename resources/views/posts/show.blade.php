 {{-- FORM - VALIDATION FORM --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>POST</title>
</head>
<body> --}}
{{-- FORM - BASIC --}}
    {{-- <h1>Thêm bài viết</h1>
<form action="post/add" method="POST">
    <input type="text" name="title" id="" placeholder="Tiêu đề"><br>
    <textarea name="content" id="" cols="30" rows="10" placeholder="Nội dung"></textarea><br>
    <input type="submit" name="sm-add">
</form>  --}}

{{-- FORM - BOOTSTRAP --}}
{{-- <form class="container">
    <h1 class="text-center">Thêm bài viết</h1>
    <div class="form-group">
      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

 </body>
</html>  --}}


{{-- FORM - LARAVELCOLLECTIVE --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class='container'>
        <h1>Trang danh sách bài viết</h1>
        <ul>
            @foreach ($posts as $post)
            <li>
                <a href="">{{$post->title}}</a> <br>
                <img src="{{url($post->thumbnail)}}" alt="" style="width:100px">
                <p>{{$post->content}}</p>
            </li>
            @endforeach
        </ul>
       
    </div>
</body>
</html>






