@extends('layouts.main')
@section('title')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('book.update', $book->id)}}" method="post">
            @csrf
            @method('patch')
            <div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Название книги</label>
                    <label for="title"></label><input type="text" name="title" class="form-control" id="title"
                                                      placeholder="Title" value="{{$book->title}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Описание</label>
                    <label for="description"></label><input type="text" name="description" class="form-control"
                                                            id="description" placeholder="Description"
                                                            value="{{$book->description}}">
                </div>
                <div class="form-group">
                    <label for="author">Авторы</label>
                    <select multiple class="form-control" id="author" name="authors[]">
                        @foreach($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Количество</label>
                    <label for="amount"></label><input type="text" name="amount" class="form-control" id="amount"
                                                       placeholder="Amount" value="{{$book->amount}}">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
            </div>
            @yield('content')
        </form>
    </div>
@endsection
