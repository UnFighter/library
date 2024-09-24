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
        <form action="{{route('users.store')}}" method="post">
            @csrf
            <div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Имя пользователя</label>
                    <label for="name"></label><input type="text" name="name" class="form-control" id="name"
                                                      placeholder="Name">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Электронная почта</label>
                    <label for="email"></label><input type="text" name="email" class="form-control" id="email"
                                                            placeholder="Email">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
            </div>
            @yield('content')
        </form>
    </div>
@endsection
