<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($info as $item)
        <div class="card">
            <h6>Title:</h6>
            <p>{{$item['title']}}</p>
            <p>{{$item['summary']}}</p>
        </div>
    @endforeach
</body>
</html>