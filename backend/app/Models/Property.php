<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'street',
        'number',
        'neighborhood',
        'city',
        'complement',
        'state',
        'zip_code',
        'type',
        'built_area',
        'land_area',
        'bedrooms',
        'bathrooms',
        'status',
        'owner_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'property_id');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'property_id');
    }
}
