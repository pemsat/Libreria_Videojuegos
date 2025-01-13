<?php

namespace App\Livewire;

use App\Models\Game;
use Livewire\Component;

class GameDetail extends Component
{
    public $videogame;
    public $rating;

    public function mount(Game $videogame)
    {
        $this->videogame = $videogame;
        $this->rating = $videogame->rating;
    }

    public function rate()
    {
        $this->validate([
            'rating' => 'required|integer|between:1,5',
        ]);

        $this->videogame->update(['rating' => $this->rating]);

        session()->flash('message', 'Rating updated!');
    }
    public function render()
    {
        return view('livewire.game-detail');
    }
}
