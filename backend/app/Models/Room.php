<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'observations',
        'property_id',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'room_id');
    }
}
