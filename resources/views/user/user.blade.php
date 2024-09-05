@extends('layouts.main')
@section('title')
    <div>
        <h1>Список пользователей</h1>
    </div>

    <nav class="navbar navbar-light">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Имя</th>
                <th scope="col">Почта</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="{{route('user.show', $user->id)}}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
