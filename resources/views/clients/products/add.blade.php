@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <h2>Thêm sản phẩm</h2>

    {{-- @if ($errors->any())
        <div class="alert alert-danger text-center">
            Vui lòng kiểm tra lại dữ liệu
        </div>
    @endif --}}

    @error('msg')
        <div class="alert alert-danger text-center">
            {{ $message }}
        </div>
    @enderror
    <form action="" method="POST">
        <div class="mb-3">
            <label for="product_name">Tên sản phẩm</label>
            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Tên sản phẩm..."
                value="{{ old('product_name') }}" />

            @error('product_name')
                <span style="color:
                red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="product_price">Tên sản phẩm</label>
            <input type="text" name="product_price" id="product_price" class="form-control"
                placeholder="Giá sản phẩm..." />
            @error('product_price')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        @csrf
        {{-- @method('PUT') --}}
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
