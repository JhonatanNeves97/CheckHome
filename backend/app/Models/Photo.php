<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'path',
        'type',
        'inspection_item_id',
    ];

    public function inspectionItem()
    {
        return $this->belongsTo(InspectionItem::class, 'inspection_item_id');
    }
}
