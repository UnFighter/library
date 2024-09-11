@extends('layouts.main')
@section('title')
    <div>
        <h1>Список книг</h1>

@include('book.search-bar')

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
                        <td><a href="{{route('book.show', $book->id)}}"> {{$book->title}}</a></td>
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


