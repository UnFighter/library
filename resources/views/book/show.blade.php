@extends('layouts.main')
@section('title')
    <div>
        <div class="container-fluid">
            <div class="m-3 p-1">
                <h1 style="font-size: 28px">Название книги</h1>
                <div>
                    <div> {{$book->title}}</div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="m-3 p-1">
                <h1 style="font-size: 28px">Описание книги</h1>
                <div>
                    <div> {{$book->description}}</div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="m-3 p-1">
                <h2 style="font-size: 28px">Автор книги</h2>
                <div>
                    @foreach($book->authors as $author)
                        {{ $author->name }}@if (!$loop->last)
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="m-3 p-1">
                <h1 style="font-size: 28px">Количество книг</h1>
                <div>
                    <div> {{$book->amount}}</div>
                </div>
            </div>
        </div>

        <div>
            <div class="m-5">
                <div>
                    <a href="{{route('book.edit', $book->id)}}">Edit</a>
                </div>
                <div style="margin-top: 20px">
                    <a href="{{route('book.index')}}">Back</a>
                </div>
            </div>

            <div class="m-4">
                <form action="{{route('book.destroy', $book->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </div>
        </div>

    </div>
@endsection


