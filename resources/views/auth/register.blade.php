@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Đăng kí tài khoản</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger text-center">
                                Đã có lỗi xảy ra. Vui lòng kiểm tra lại dữ liệu bên dưới
                            </div>
                        @endif
                        @if (session('msg'))
                            <div class="alert alert-success text-center">
                                {{ session('msg') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="fullname" class="col-md-4 col-form-label text-md-end">Họ và tên</label>

                                <div class="col-md-6">
                                    <input id="fullname" type="text" placeholder="Họ và tên..."
                                        class="form-control @error('fullname') is-invalid @enderror" name="fullname"
                                        value="{{ old('fullname') }}" autocomplete="fullname" autofocus>
                                    @error('fullname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Địa chỉ email</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" placeholder="Địa chỉ email..."
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-end">Tên đăng nhập</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" placeholder="Tên đăng nhập..."
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" autocomplete="username">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Mật khẩu</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="Mật khẩu..."
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Xác nhận mật
                                    khẩu</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" placeholder="Xác nhận mật khẩu..." type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" autocomplete="new-password">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Đăng ký
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
