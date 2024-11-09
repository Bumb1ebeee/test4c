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
<a href="{{route('logout')}}">Выйти</a>
<a href="{{route('mainPage')}}">Главная</a>
<a href="{{route('draftPage')}}">Черновики</a>
<form action="{{route('store')}}" method="post">
    @csrf
    <label for="title">Заголовок</label>
    <input type="text" name="title">
    @error('title')
    <div>{{$message}}</div>
    @enderror

    <label for="text">Текст</label>
    <textarea name="text"> </textarea>
    @error('text')
    <div>{{$message}}</div>
    @enderror

    <button>Сохранить</button>
</form>
<ol>
    @foreach($user->stories as $story)
        <li>
            <h1>{{$story->title}}</h1>
            <p>{{$story->text}}</p>
            <p>{{$story->created_at}}</p>
            @if($story->status == 'draft')
                <form action="{{route('publish')}}" method="post">
                    @csrf
                    <input type="text" value="{{$story->id}}" name="id" hidden>
                    <button>Опубликовать</button>
                </form>
            @else
                <form action="{{route('draft')}}" method="post">
                    @csrf
                    <input type="text" value="{{$story->id}}" name="id" hidden>
                    <button>Добавить в черновик</button>
                </form>
            @endif


        </li>
    @endforeach
</ol>

</body>
</html>
