@extends('layouts.app')

@section('title','Tiêu đề trang child')

@section('content')
    <p>Nội dung trang con</p>

    {{-- Display data --}}
    {{-- <p>Họ và tên: {!!$data!!}</p> --}}

    {{-- If else --}}
    {{-- @if ($data%2 == 0)
        <p>{{$data}} là số chẵn</p>
    @else
        <p>{{$data}} là số lẽ</p>
    @endif --}}

    {{-- for --}}
    {{-- @for ($i = 0; $i < count($data); $i++)
        The current value is {{$data[$i]}} <pre></pre>
    @endfor --}}

    {{-- foreach --}}
    {{-- @foreach ($users as $user)
      {{$user['name']}} <pre></pre>
    @endforeach --}}

    {{-- Code PHP in Blade --}}
        {{-- @php
            foreach ($users as $user) {
                echo $user['name'];
            }
        @endphp --}}

    {{-- Isset, empty --}}

    {{-- @isset($post_title)
        <p>Tiêu đề: {{$post_title}}</p>
    @endisset --}}

    @empty($users)
        <p>Không tồn tại Users</p>
    @endempty
@endsection

@section('sidebar')
    @parent
    <p>Sidebar trang con</p>
@endsection

