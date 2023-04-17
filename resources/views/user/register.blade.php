<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <div class='container'>
    {!! Form::open(['url'=>'user/store', 'method' =>'POST']) !!}
    <div class='form-group'>
        {!! Form::label('username', 'Tên đăng nhập: ', []) !!}
        {!!  Form::text('username', '', ['class'=>'form-control', 'placeholder' => 'quangson']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('email', 'Mật khẩu: ', []) !!}
        {!!  Form::text('emaildss','', ['class'=>'form-control', 'placeholder' => 'quangson@gmail.com']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('password', 'Mật khẩu: ', []) !!}
        {!!  Form::password('password', ['class'=>'form-control', 'placeholder' => '*******']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('city', 'Thành phố: ') !!}
        {!! Form::select('city', [ 1=>'Hà Nội', 2 =>'HCM', 3=>'Quảng Ngãi'], 2, ['class'=>'form-control', 'placeholder'=>'Chọn']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('gender', 'Giới tính: ') !!}
      <div class="form-check">
        {!! Form::radio('gender', 'male',true, ['class'=>'form-check-input', 'id'=>'male']) !!}
        {!! Form::label('male', 'Nam', ['class'=>'form-check-label']) !!}
      </div>
      <div class="form-check">
          {!! Form::radio('gender', 'female',false, ['class'=>'form-check-input', 'id'=>'female']) !!}
          {!! Form::label('female', 'Nữ', ['class'=>'form-check-label']) !!}
    </div>
    </div>
    <div class='form-group'>
        {!! Form::label('skills', 'Kĩ năng: ') !!}
        <div class="form-check">
            {!! Form::checkbox('skills', 'html',false, ['class'=>'form-check-input', 'id'=>'html']) !!}
            {!! Form::label('html', 'HTML', ['class'=>'form-check-label']) !!}
        </div>
        <div class="form-check">
            {!! Form::checkbox('skills', 'css',false, ['class'=>'form-check-input', 'id'=>'css']) !!}
            {!! Form::label('css', 'CSS', ['class'=>'form-check-label']) !!}
        </div>
        <div class="form-check">
            {!! Form::checkbox('skills', 'javascript',false, ['class'=>'form-check-input', 'id'=>'javascript']) !!}
            {!! Form::label('javascript', 'Javascript', ['class'=>'form-check-label']) !!}
        </div>
    </div>
    <div class='form-group'>
        {!! Form::label('birth', 'Ngày sinh: ') !!}
        {!! Form::date('birth', '', ['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('intro', 'Giới thiệu bản thân: ') !!}
        {!! Form::textarea('intro', '', ['class'=>'form-control', 'id'=>'intro']) !!}
    </div>
    <div class='form-group text-center'>
        {!! Form::submit('Đăng kí', ['class' => 'btn btn-primary', 'name'=>'sm-reg']) !!}
    </div>
    {!! Form::close() !!}
    </div>
</body>
</html>