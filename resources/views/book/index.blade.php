@extends('layouts.main')
@section('title')
    <div>
        <h1>Список книг</h1>
        <div class="m-3">
            @foreach($books as $book)
                <div><a href="{{route('book.show', $book->id)}}"> {{$book->title}}</a></div>
            @endforeach
        </div>
    </div>
@endsection


