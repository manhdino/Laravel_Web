@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Vui lòng kích hoạt tài khoản của bạn</div>

                    <div class="card-body">
                        @if (session('msg'))
                            <div class="alert alert-success text-center">
                                {{ session('msg') }}
                            </div>
                        @endif

                        {{ 'Hãy kiểm tra link xác nhận trong email của bạn.' }}
                        {{ 'Nếu không nhận được email, nhấn link để gửi lại' }},
                        <form method="POST" class="mt-2" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">{{ __('Gửi lại email') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
