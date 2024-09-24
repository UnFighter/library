@extends('layouts.main')
@section('title')
    <div>
        <h1>Список книг</h1>
        <form action="{{ route('books.index') }}" method="GET" class="form-inline">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Поиск" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>

        <div class="table">
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Название</th>
                    <th>Автор(ы)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{$book->id}}</td>
                        <td><a href="{{route('books.show', $book->id)}}"> {{$book->title}}</a></td>
                        <td>
                            @foreach($book->authors as $author)
                                {{ $author->name }}{{ !$loop->last ? ', ' : '' }}
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {{ $books->links() }} <!-- Отображение ссылок для пагинации -->
        </div>
    </div>
@endsection


