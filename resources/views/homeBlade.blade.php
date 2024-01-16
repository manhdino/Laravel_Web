<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unicode Web</title>
</head>

<body>
    <header>
        <h1>Unicode</h1>
        <h3>{{ $title }}</h3>
        <h3>{{ $content }}</h3>
        {{-- Không bảo mật dễ bị tấn công XSS --}}
        <h4><?php echo request()->username; ?></h4>
        {{-- Bảo mật hơn --}}
        <h4>{{ request()->username ?? 'No username!' }}</h4>
        <h4>{{ $description }}</h4>
        <h4>{!! $description !!}</h4>
        <hr />
        <h4>For:</h4>
        @for ($i = 0; $i < 10; $i++)
            @if ($i == 5)
                @continue
            @endif
            {{ $i }}
        @endfor

        <h4>While:</h4>
        @while ($index < 10)
            {{ $index }}
            @php
                $index++;
            @endphp
        @endwhile

        <h4>For each:</h4>
        @foreach ($dataArr as $key => $item)
            <p> {{ $key }} - {{ $item }}</p>
        @endforeach

        <h4>For else: else chỉ duy nhất cho trường hợp mảng rỗng</h4>
        @forelse ($dataArr as $key=>$item)
            <p> {{ $key }} - {{ $item }}</p>
        @empty
            <p>Không có dữ liệu</p>
        @endforelse

        <h4>If-else:</h4>
        @if ($number < 0)
            <p>Số âm</p>
        @elseif($number > 0 && $number < 5)
            <p>Số bé</p>
        @else
            <p>Số lớn</p>
        @endif

        <h4>Switch-case:</h4>
        @switch($skey)
            @case(1)
                <p>{{ $skey }}</p>
            @break

            @case(2)
                <p>{{ $skey }}</p>
            @break

            @default
                <p>No key</p>
        @endswitch

    </header>
    <main>
        <h1> Noi dung Unicode </h1>
    </main>
    <footer>
        <h1>Footer</h1>
    </footer>
</body>

</html>
