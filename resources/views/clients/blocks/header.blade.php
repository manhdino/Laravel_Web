<header class="py-3 mx-2">
    {{-- <div class="container"> --}}
    <div class="row">
        <div class="col-4">
            <h1 class="ms-2">Unicode</h1>
        </div>
        <div class="col-8 d-flex justify-content-end align-items-center">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home.products') }}">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home.services') ?? route('errors') }}">Dịch vụ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home.news') ?? route('errors') }}">Tin tức</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home.contact') ?? route('errors') }}">Liên hệ</a>
                </li>
            </ul>
        </div>
    </div>
    {{-- </div> --}}
</header>
