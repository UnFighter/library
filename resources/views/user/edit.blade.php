@extends('layouts.main')
@section('title')
    <div class="container">
{{--        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif--}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('user.update', $user->id) }}" method="post">
            @csrf
            @method('patch')
            <div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Имя пользователя</label>
                    <label for="name"></label><input type="text" name="name" class="form-control" id="name"
                                                      placeholder="Name" value="{{$user->name}}">

                    @error('name')
                    <div class="alert alert-danger">{{ "Поле не должно быть пустым" }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Электронная почта</label>
                    <label for="email"></label><input type="text" name="email" class="form-control" id="email"
                                                            placeholder="Email" value="{{$user->email}}">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
            </div>
            @yield('content')
        </form>
    </div>
@endsection
