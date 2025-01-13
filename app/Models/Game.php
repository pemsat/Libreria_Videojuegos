<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title', 
        'description', 
        'cover', 
        'rating', 
        'comment', 
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
