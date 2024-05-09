<?php

namespace App\Models;
use App\Models\University;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Classement extends Model
{
    public function critere()
    {
        return $this->belongsTo(Critere::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
