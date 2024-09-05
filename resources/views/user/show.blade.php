@extends('layouts.main')
@section('title')
    <div class="container-fluid">
        <div class="m-3 p-1">
            <h1 style="font-size: 28px">Имя пользователя</h1>
            <div>
                <div>{{$user->name}}</div>
            </div>
        </div>

        <div class="m-3 p-1">
            <h1 style="font-size: 28px">Электронная почта</h1>
            <div>
                <div>{{$user->email}}</div>
            </div>
        </div>
        <div class="m-3 p-1">
            <h1 style="font-size: 28px">Электронная почта</h1>
            <div>
                <div>{{$user->email}}</div>
            </div>
        </div>
        <div class="m-3 p-1">
            <h2 style="font-size: 28px">Книги пользователя</h2>
            <div class="table">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Название</th>
                        <th scope="col">Авторы</th>
                        <th scope="col">Списать</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>
                                @foreach($book->authors as $author)
                                    {{ $author->name }}@if (!$loop->last), @endif
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('user.destroyConnection', ['user' => $user->id, 'book' => $book->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning btn-sm">
                                        Удалить связь
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

{{--            Нужно быть сделать возврат книг которые взял пользователь при удалении--}}{{--
            <div class="m-4">
                <form action="{{route('user.destroy', $user->id)}}" method="post" onsubmit="return confirm('Вы уверены, что хотите удалить этого пользователя?');">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Удалить пользователя" class="btn btn-danger">
                </form>
            </div>--}}
        </div>

@endsection


