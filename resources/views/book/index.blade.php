@extends('layouts.main')
@section('title')
    <div>
        <h1>Список книг</h1>
        <nav class="navbar navbar-light">
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
        <div class="m-3">
            @foreach($books as $book)
                <div><a href="{{route('book.show', $book->id)}}"> {{$book->title}}</a></div>
            @endforeach
        </div>
    </div>
@endsection


