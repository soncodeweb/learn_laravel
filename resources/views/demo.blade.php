@php
    $data = array("title" =>"Nội dung comment");
@endphp
@include('comment.comment', ['data' => $data])