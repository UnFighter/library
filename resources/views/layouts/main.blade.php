<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body style="height: 900px;">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="{{route('main.index')}}" class="navbar-brand">Telecom Library</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{route('about.index')}}" class="nav-link">О компании</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contact.index')}}" class="nav-link">Контакты</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('books.index')}}" class="nav-link">Библиотека</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('books.create')}}" class="nav-link">Создать книгу</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('users.index')}}" class="nav-link">Пользователи</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('users.create')}}" class="nav-link">Создать пользователя</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <nav>
        <div class="container" style="margin-top: 100px;">
            @yield('title')
        </div>
    </nav>
</body>
</html>
