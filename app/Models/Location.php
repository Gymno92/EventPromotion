<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';

    protected $fillable = [
        'name',
        'city',
        'street',
        'postcode',
        'country',
        'description',
    ];

    public function events() {
        return $this->hasMany(Event::class);
    }
}
