<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'subject_id',
        'marks',

    ];
    public function assSubject()
    {
        return $this->belongsTo(AssignSubject::class, 'assign_subjects_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
