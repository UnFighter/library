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
                        <th scope="col">Id</th>
                        <th scope="col">Название</th>
                        <th scope="col">Авторы</th>
                        <th scope="col">Списание</th>
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
                                <div class="m4">
                                    <form action="{{ route('user.destroyConnection', ['user' => $user->id, 'book' => $book->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning">Списать</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div>
                <h1 style="font-size: 28px">Выдать книгу</h1>
                @include('user.book-search-bar')
                <div>
                    @if(isset($search) && !empty($search))
                        <h2 style="font-size: 28px">Результаты поиска для: "{{ $search }}"</h2>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Название</th>
                                    <th>Авторы</th>
                                    <th>Выдача</th>
                                </tr>
                                </thead>
                                <tbody>
                                @unless($books->isEmpty())
                                    @foreach($books as $book)
                                        <tr>
                                            <td>{{ $book->id }}</td>
                                            <td><a href="{{ route('book.show', $book->id) }}">{{ $book->title }}</a></td>
                                            <td>
                                                @foreach($book->authors as $author)
                                                    {{ $author->name }}{{ !$loop->last ? ', ' : '' }}
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="m4">
                                                    <form action="{{ route('user.createConnection', ['user' => $user->id, 'book' => $book->id]) }}" method="post">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="btn btn-success">Добавить</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">Ничего не найдено</td>
                                    </tr>
                                @endunless
                                </tbody>
                            </table>
                    @else
                        <p>Введите запрос для поиска книг.</p>
                    @endif
                </div>
            </div>


            <div class="m-4">
                <form action="{{route('user.destroy', $user->id)}}" method="post" onsubmit="return confirm('Вы уверены, что хотите удалить этого пользователя?');">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Удалить пользователя" class="btn btn-danger">
                </form>
            </div>
        </div>

@endsection


