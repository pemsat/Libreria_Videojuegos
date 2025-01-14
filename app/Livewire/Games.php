<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Games extends Component
{
    use WithFileUploads;

    public $games = [];
    public $title;
    public $description;
    public $cover;
    public $modalOpen = false;

    protected $rules = [
        'title' => 'required|string|min:4|max:255',
        'description' => 'required|string|min:4|max:255',
        'cover' => 'image|max:5120|mimes:jpg,jpeg,png|nullable',
    ];

    // Abrir el modal para crear un juego nuevo
    public function showModal()
    {
        $this->modalOpen = true;
    }

    // Cerrar el modal
    public function closeModal()
    {
        $this->modalOpen = false;
    }

    // Limpiar los campos
    public function clearFields()
    {
        $this->reset(['title', 'description', 'cover']);
    }

    // Crear un nuevo juego
    public function createGame()
    {
        // Validar los campos
        $this->validate($this->rules);

        $game = new Game();
        $game->title = $this->title;
        $game->description = $this->description;

        // Subir la portada del juego
        if ($this->cover) {
            // $coverPath = $this->cover->storeAs('', time() . '.' . $this->cover->getClientOriginalExtension(), 'gameCovers');
            // $game->cover = $coverPath;
            try {
                $coverPath = $this->cover->storeAs('', time() . '.' . $this->cover->getClientOriginalExtension(), 'gameCovers');
                $game->cover = $coverPath;
            } catch (\Exception $e) {
                dd('Error al guardar el archivo:', $e->getMessage());
            }
        } else {
            $game->cover = "cover.png"; // Imagen predeterminada
        }

        // Asignar el ID del usuario que creó el juego
        $game->user_id = Auth::id();
        $game->save();

        // Enviar un correo al administrador (opcional)
        // Mail::to('admin@example.com')->send(new GameCreated($game));

        // Limpiar los campos del formulario
        $this->clearFields();
        // Cerrar el modal después de la creación
        $this->closeModal();

        // Mostrar un mensaje de éxito
        session()->flash('message', 'Juego creado exitosamente!');
    }

    // Cargar todos los juegos
    public function render()
    {
        $this->games = Game::all();

        return view('livewire.games')->layout('layouts.app');
    }

}
