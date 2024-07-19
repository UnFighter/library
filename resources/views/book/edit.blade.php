@extends('layouts.main')
@section('title')
    <div class="container">
        <form action="{{route('book.update', $book->id)}}" method="post">
            @csrf
            @method('patch')
            <div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Book title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{$book->title}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" id="description" placeholder="Description" value="{{$book->description}}">
                </div>
                <div class="form-group">
                    <label for="author">Authors</label>
                    <select multiple class="form-control" id="author" name="authors[]">
                        @foreach($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
            @yield('content')
        </form>
    </div>
@endsection
