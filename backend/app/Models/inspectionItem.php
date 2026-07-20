<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InspectionItem extends Model
{
    protected $fillable = [
        'item_condition',
        'avaria',
        'observations',
        'inspection_id',
        'item_id',
    ];

    public function inspection()
    {
        return $this->belongsTo(Inspection::class, 'inspection_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'inspection_item_id');
    }
}
