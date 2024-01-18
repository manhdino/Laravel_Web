@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <h2>Thêm sản phẩm</h2>
    <form action="" method="POST">
        <input type="text" name="username" />
        <button type="submit">Submit</button>
        @csrf
        @method('PUT')
    </form>
@endsection

@section('sidebar')
    @parent
    <h1> Sidebar Add Products</h1>
@endsection

@section('css')
    <style>
        header {
            font-size: 16px;
        }
    </style>
@endsection

@section('js')
@endsection
