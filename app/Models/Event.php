<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'speaker',
        'description',
        'event_date',
        'location',
        'capacity',
        'is_public',
        'category',
        'image',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
