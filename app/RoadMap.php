<?php

namespace Siscor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roadmap extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'status', 'reason', 'description'
    ];

    protected $dates = ['deleted_at'];

    public function unit()
    {
        return $this->belongsTo('Siscor\Unit');
    }

    public function scopeUnitidIs($query, $id)
    {
        return $query->where('unit_id', $id);
    }

    public function scopeDirectionidIs($query, $id)
    {
        return $query->where('direction_id', $id);
    }



}
