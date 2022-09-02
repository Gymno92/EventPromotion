<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performer extends Model
{
    use HasFactory;

    protected $table = 'performers';

    protected $fillable = [
        'title',
        'firstName',
        'lastName',
        'description',
    ];

    public function events() {
        return $this->hasMany(Event::class);
    }
}
