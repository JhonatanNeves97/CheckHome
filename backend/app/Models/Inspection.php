<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    protected $fillable = [
        'inspection_type',
        'inspection_status',
        'inspection_date',
        'start_time',
        'end_time',
        'notes',
        'contract_id',
        'inspector_id',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }

    public function inspector()
    {
        return $this->belongsTo(User::class, 'inspector_id');
    }

    public function inspectionItem()
    {
        return $this->hasMany(InspectionItem::class, 'inspection_id');
    }
}
