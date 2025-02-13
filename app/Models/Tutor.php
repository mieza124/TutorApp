<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'bio', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postings()
    {
        return $this->hasMany(Posting::class);
    }

    public function tutoringsessions()
    {
        return $this->hasMany(TutoringSession::class);
    }
}
