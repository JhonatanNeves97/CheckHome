<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'contract_number',
        'start_date',
        'end_date',
        'contract_value',
        'security_deposit',
        'contract_status',
        'observations',
        'tenant_id',
        'property_id',
    ];

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function inspections()
    {
        return $this->hasMany(Inspection::class, 'contract_id');
    }
}
