@extends('layouts.client')

@section('title')
    Trang chủ
@endsection

@section('content')
    @hello('dinomanh')
    <h1>Trang chủ Home</h1>
    @env('production')
    <p>Production Enviroment</p>
    @elseenv('test')
    <p>Test Enviroment</p>
@else
    <p>Dev Enviroment</p>
    @endenv
    @php

    @endphp
    {{-- <x-alert type='success' content="{{ $content }}" /> --}}
    <x-alert alert-type='danger' :content="$content" />
    <x-forms.input />
@endsection

@section('sidebar')
    @parent
    <h1>Home Sidebar</h1>

    {{-- <button type="button" class="show">Show</button> --}}
@endsection

@section('css')
@endsection

@section('js')
    {{-- <script>
        document.querySelector('.show').onclick = function() {
            alert('Thành công!');
        };
    </script> --}}
@endsection
