<?php

namespace App\Http\Controllers;

use App\Mail\GameCreated;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GameController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'cover_image' => 'required|image',
        'rating' => 'nullable|integer|between:1,5',
        'comment' => 'nullable|string',
    ]);

    $path = $request->file('cover_image')->store('covers', 'public');

    $videogame = Game::create([
        'title' => $request->title,
        'description' => $request->description,
        'cover_image' => $path,
        'rating' => $request->rating,
        'comment' => $request->comment,
        'user_id' => auth()->id(),
    ]);

    // Send email to admin
    Mail::to('admin@example.com')->send(new GameCreated($videogame));

    return redirect()->route('videogames.index');
}

}
