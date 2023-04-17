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
        {!! Form::open(['url'=>'post/store', 'method' =>'POST', 'files'=>true]) !!}
        <h1 class='text-center'>Thêm bài viết</h1>
        {{-- Kiểm tra xem có bất kì lỗi nào hay không
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    Danh sách các lỗi
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <div class='form-group'>
            {!!  Form::text('title', '', ['class'=>'form-control', 'placeholder' => 'Tiêu đề']) !!}
            @error('title')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class='form-group'>
            {!! Form::textarea('content', '', ['class'=>'form-control', 'placeholder' =>'Nội dung']) !!}
            @error('content')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class='form-group'>
           {!! Form::file('file', ['class'=>'form-control-file']) !!}
        </div>
        <div class='form-group text-center'>
            {!! Form::submit('Thêm mới', ['class' => 'btn btn-primary', 'name'=>'sm-add']) !!}
        </div>
   {!! Form::close() !!}
    </div>
</body>
</html>






