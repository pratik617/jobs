<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationTechnology extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',
        'technology',
        'skill_level'
    ];
}
