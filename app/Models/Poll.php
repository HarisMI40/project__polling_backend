<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Choice;
use App\Models\User;
class Poll extends Model
{
    use HasFactory;
    public $keyType = 'string';
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'deadline',
        'choices',
    ];

    public function choices()
    {
        //dari kolom table sendiri, kolom table yang direlasikan
        // return $this->hasMany(Choice::class, 'id', 'id_poll');
        return $this->hasMany(Choice::class, 'id_poll', 'id');
    }


    public function user(){
        //dari kolom table sendiri, kolom table yang direlasikan
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
