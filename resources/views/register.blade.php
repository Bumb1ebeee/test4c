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
<a href="{{route('loginPage')}}">Войти</a>
<a href="{{route('mainPage')}}">Главная</a>
<form action="{{route('register')}}" method="post">
    @csrf
    <label for="name">Имя</label>
    <input type="text" name="name">
    @error('name')
    <div>{{$message}}</div>
    @enderror

    <label for="email">Почта</label>
    <input type="email" name="email">
    @error('email')
    <div>{{$message}}</div>
    @enderror

    <label for="email_confirmation">Подтверждение почты</label>
    <input type="email" name="email_confirmation">
    @error('email_confirmation')
    <div>{{$message}}</div>
    @enderror

    <label for="password">Пароль</label>
    <input type="password" name="password">
    @error('password')
    <div>{{$message}}</div>
    @enderror

    <button>Зарегистрироваться</button>
</form>
</body>
</html>
