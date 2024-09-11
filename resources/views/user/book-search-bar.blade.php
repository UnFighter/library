<form action="{{ route('user.book-search', ['user' => $user->id]) }}" method="GET" class="form-inline">
    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Поиск" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
</form>
