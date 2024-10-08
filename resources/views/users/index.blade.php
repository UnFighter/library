@extends('layouts.main')
@section('title')
    <div>
        <h1>Список пользователей</h1>
    </div>

    <form action="{{ route('users.index') }}" method="GET" class="form-inline">
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Поиск" aria-label="Search" >
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
    </form>
    <div class="table">
        <table>
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Имя</th>
                <th scope="col">Почта</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="{{route('users.show', $user->id)}}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $users->links() }} <!-- Отображение ссылок для пагинации -->
        </div>
    </div>

@endsection
