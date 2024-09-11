@extends('layouts.main')
@section('title')
    <div>
        <h1>Список пользователей</h1>
    </div>

    @include('user.search-bar')

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
                    <td><a href="{{route('user.show', $user->id)}}">{{ $user->name }}</a></td>
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
