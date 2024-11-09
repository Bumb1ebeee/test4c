<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="{{route('profile')}}">Профиль</a>
<ol>
    @foreach($stories as $story)
        <li>
            <h1>{{$story->title}}</h1>
            <p>{{$story->text}}</p>
            <p>{{$story->created_at}}</p>
            <form action="{{route('publish')}}" method="post">
                @csrf
                <input type="text" value="{{$story->id}}" name="id" hidden>
                <button>Опубликовать</button>
            </form>
        </li>
    @endforeach
</ol>

</body>
</html>
