<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use App\Services\Book\Service;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service; // Инициализация свойства в конструкторе
    }

    protected int $perPage = 10; // Пагинация

    public function index(): Factory|View|Application
    {
        $books = Book::paginate($this->perPage);
        return view('book.index', compact('books'));
    }

    public function create(Book $book): Factory|View|Application
    {
        $authors = Author::all();
        return view('book.create', compact('book', 'authors'));
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->authors()->detach();
        $book->user()->detach();
        $book->delete();
        return redirect()->route('book.index');
    }

    public function edit(Book $book): Factory|View|Application
    {
        $authors = Author::all();
        return view('book.edit', compact('book', 'authors'));
    }

    public function show(Book $book): Factory|View|Application
    {
        $book->load('authors');
        return view('book.show', compact('book'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('book.index');
    }

    public function update(UpdateRequest $request, Book $book): RedirectResponse
    {
        $data = $request->validated();
        $this->service->update($book, $data);
        return redirect()->route('book.index', $book->id);
    }

    public function searchBook(Request $request): Factory|View|Application
    {
        $search = $request->input('search');
        if ($search) {
            $books = Book::where('title', 'LIKE', "%$search%")
                ->orWhereHas('authors', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                })
                ->paginate($this->perPage);
        } else {
            $books = collect();
        }
        return view('book.index', compact('books'));
    }
    public function searchBookForUser(Request $request, User $user): Factory|View|Application
    {
        $search = $request->input('search');
        $user->load('books');
        if ($search) {
            $books = Book::where('title', 'LIKE', "%$search%")
                ->orWhereHas('authors', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                })
                ->get();
        } else {
            $books = collect();
        }
        return view('user.show', compact('user', 'books', 'search'));
    }
}
