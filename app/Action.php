<?php

namespace Siscor;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
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


}
