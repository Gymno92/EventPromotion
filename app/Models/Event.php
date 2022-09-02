<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'name',
        'date',
        'description',
        'price',
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id')->withTimestamps();
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function performer() {
        return $this->belongsTo(Performer::class);
    }
}
