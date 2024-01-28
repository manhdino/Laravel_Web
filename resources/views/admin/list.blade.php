<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <h1>Danh sách bài viết</h1>

    @can('post.add')
        <button href="" class="btn btn-primary">Thêm bài viết</button>
    @endcan

    <hr>

    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa libero enim deserunt est, autem tenetur quis sint
        voluptatem laudantium? Nam cumque quia asperiores harum accusamus veritatis rerum, magni iusto esse!</p>
</body>

</html>
