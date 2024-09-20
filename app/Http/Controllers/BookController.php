<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    protected int $perPage = 10; // Пагинация

    public function index(Request $request): Factory|View|Application
    {
        $search = $request->input('search');
        if ($search) {
            $books = Book::where('title', 'LIKE', "%$search%")
                ->orWhereHas('authors', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                })
                ->paginate($this->perPage);
        } else {
            $books = Book::paginate($this->perPage);
        }
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

            $authors = $data['authors'];
            unset($data['authors']);

            $book = Book::query()->create($data);
            $book->authors()->attach($authors);
            return redirect()->route('book.index');
    }

    public function update(UpdateRequest $request, Book $book): RedirectResponse
    {
        try{
            $data = $request->validated();

            $authors = $data['authors'];
            unset($data['authors']);

            $book->update($data);
            $book->authors()->sync($authors);
            return redirect()->route('book.index', $book->id);
        }
        catch (\Exception $e) {
            Log::error('Ошибка при обновлении пользователя: ' . $e->getMessage());
            return back()->with(['error' => 'Не удалось обновить книгу. Попробуйте снова.']);
        }
    }

    public function createBookUserConnection(User $user, Book $book): RedirectResponse
    {
        $currentAmount = $book->amount;
        $currentBookId = $book->id;
        if ($currentAmount <= 0) {
            return redirect()->back()->withErrors(['amount' => 'Недостаточно книг']);
        }
        elseif ($user->books()->where('book_id', $currentBookId)->exists()) {
            return redirect()->back()->withErrors(['amount' => 'У пользователя уже есть такая книга']);
        }
        $user->books()->attach($book);
        $book->increment('amount', -1);
        return redirect()->back();
    }

    public function destroyBookUserConnection(User $user, Book $book): RedirectResponse
    {
        $user->books()->detach($book);
        $book->increment('amount', 1);
        return redirect()->back();
    }
}
