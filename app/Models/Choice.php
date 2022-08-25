<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vote;

class Choice extends Model
{
    use HasFactory;
    protected $fillable = ['choice', 'id_poll'];

    public function votes()
    {
        return $this->hasMany(Vote::class, 'choice_id', 'id');
    }
}
