<?php

namespace Siscor;

use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
    //

    protected $fillable = [
        'receiver_user_id', 'action_id' 
    ];

    protected $dates = ['deleted_at'];


    public function roadmap()
    {
    	return $this->belongsTo('Siscor\Roadmap');
    }

   
    // public function scopeUnitidIs($query, $id)
    // {
    //     return $query->where('unit_id', $id);
    // }

    // public function scopeDirectionidIs($query, $id)
    // {
    //     return $query->where('direction_id', $id);
    // }

    // public function direction()
    // {
    //     return $this->belongsTo('Siscor\Direction');
    // }

    // public function userCreated()
    // {
    //     return $this->belongsTo('Siscor\Users');
    // }

    // public function userModified()
    // {
    //     return $this->userCreated();
    // }
}
