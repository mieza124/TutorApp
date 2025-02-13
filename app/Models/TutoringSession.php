<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TutoringSession extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'tutoringsessions'; //if deleted, it will recognize table as tutoring_sessions

    protected $fillable = ['subject_id', 'tutor_id', 'schedule', 'registered', 'availability', 'mode', 'fees'];

     
    public function subject()
    {
        //return $this->belongsTo(Subject::class);
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function tutor()
    {
        //return $this->belongsTo(Tutor::class);
        return $this->belongsTo(Tutor::class, 'tutor_id');
    }

    public function postings()
    {
        //return $this->hasMany(Posting::class);
        return $this->hasMany(Posting::class, 'tutoringsession_id');
    }
}

