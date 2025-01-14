<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class GameDetail extends Component
{
    use WithFileUploads;
    
    public $game;
    public $content;
    public $rating;

    public function mount(Game $game)
    {
        $this->game = $game;
    }

    public function submitComment()
    {
        $this->validate([
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Create a new comment
        Comment::create([
            'game_id' => $this->game->id,
            'user_id' => Auth::id(),
            'content' => $this->content,
            'rating' => $this->rating,
        ]);

        // Reset the form
        $this->reset(['content', 'rating']);

        // Show a success message
        session()->flash('message', 'Comment added successfully!');
    }

    public function render()
    {
        return view('livewire.game-detail')->layout('layouts.app');
    }
}


