<?php

namespace Siscor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    protected $dates = ['deleted_at'];

    public function direction()
    {
        return $this->belongsTo('Siscor\Direction');
    }

    public function positions()
    {
        return $this->hasMany('Siscor\Position');
    }

}
