<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'university_id', 'critere_id', 'user_id', 'score',
    ];

    /**
     * Get the university that this note belongs to.
     */
    public function university()
    {
        return $this->belongsTo(University::class);
    }

    /**
     * Get the critere that this note is for.
     */
    public function critere()
    {
        return $this->belongsTo(Critere::class);
    }

    /**
     * Get the user who made this note.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
