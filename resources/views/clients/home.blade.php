@extends('layouts.client')
@section('title')
    Trang chủ {{ $course }}
@endsection
@section('content')
    <h2>Trang chủ</h2>
@endsection
@section('sidebar')
    @parent
    <h1>Home Sidebar</h1>
    <button type="button" class="show">Show</button>
@endsection

@section('css')
@endsection

@section('js')
    <script>
        document.querySelector('.show').onclick = function() {
            alert('Thành công!');
        };
    </script>
@endsection
