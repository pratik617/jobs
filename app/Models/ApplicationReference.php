<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationReference extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',
        'name',
        'mobile_number',
        'relation'
    ];
}
