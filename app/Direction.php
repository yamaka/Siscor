<?php

namespace Siscor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Direction extends Model
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

    public function units()
    {
        return $this->hasMany('Siscor\Unit');
    }

    public function positions()
    {
        return $this->hasMany('Siscor\Position');
    }
}
