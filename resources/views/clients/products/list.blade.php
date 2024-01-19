@extends('layouts.client')

@section('title')
    Sản phẩm
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif
    <h2>Danh sách sản phẩm</h2>
@endsection

@section('sidebar')
    @parent
    <h1> Sidebar Products</h1>
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
