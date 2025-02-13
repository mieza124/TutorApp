<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['tutor_id', 'tutoringsession_id', 'title', 'description', 'image'];

    public function tutor()
    {
        //return $this->belongsTo(Tutor::class);
        return $this->belongsTo(Tutor::class, 'tutor_id');
    }

    public function tutoringsession()
    {
        //return $this->belongsTo(TutoringSession::class);
        return $this->belongsTo(TutoringSession::class, 'tutoringsession_id');
    }
}
