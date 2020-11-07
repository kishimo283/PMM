<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'overview', 'skill', 'start_date', 'end_date', 'recruitment', 'status', 'specification', 'link', 'price'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
