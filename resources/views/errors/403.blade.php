<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/clients/css/bootstrap.min.css') }}" />
    <title>NotFound Page</title>
</head>


<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1 class="display-1 fw-bold">403</h1>
            <p class="fs-3"> <span class="text-danger">Error!</span> Bạn không có quyền truy cập</p>
            <a href="{{ route('home') }}" class="btn btn-primary">Go Home</a>
        </div>
    </div>
</body>


</html>
