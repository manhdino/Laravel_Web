<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        #username-help {
            font-style: italic;
            color: #666;
        }
    </style>
</head>

<body>

    <div class="mx-auto" style="width: 400px;">
        <h1>Demo Response</h1>
    </div>
    {{-- <h2>{{ $title }}</h2>
    <h3>{{ $content }}</h3> --}}


    {{-- <form action="" method="POST">
        <input type="text" name="username" placeholder="Username..." value="{{ old('username') }}" />
        <button type="submit">Submit</button>
        @csrf
    </form> --}}

    <form action="" method="POST">

        <div class="mx-auto" style="width: 800px">

            <div class="form-group ms-2 mt-5">
                @if (session('mess'))
                    <h4> {{ session('mess') }}</h4>
                @endif
                <label for="username">Username</label>
                <input type="username" class="form-control w-50" id="username" aria-describedby="username-help"
                    placeholder="Enter your username... " value="{{ old('username') }}" name="username">
                <small id="username-help" class="form-text text-muted ms-1">Please enter your username. It should be
                    unique
                    and at
                    least 8 characters long.</small>
            </div>
            <button type="submit" class="btn btn-primary ms-2 mb-2">Submit</button>
        </div>
        @csrf
    </form>

    <div class="mx-auto" style="width: 800px">
        <p><img src="https://cdn.24h.com.vn/upload/1-2024/images/2024-01-16/6-1705342475-501-width740height493.jpg"
                class="ms-2 mt-2" /></p>
        <a href="{{ route('download-image') . '?image=https://cdn.24h.com.vn/upload/1-2024/images/2024-01-16/6-1705342475-501-width740height493.jpg' }}"
            class="ms-2 btn btn-primary">Download Image</a>
        <a href="{{ route('download-image') . '?image=' . public_path('storage/avatar.jpg') }}"
            class="ms-2 btn btn-primary">Download
            Image Local</a>
    </div>
</body>

</html>
