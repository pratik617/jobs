<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ApplicationWorkExperience extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',
        'company_name',
        'designation',
        'experience_from',
        'experience_to'
    ];

    public function setExperienceFromAttribute($value) {
        if ($value != '' && $value != null) {
            $experience_from = Carbon::createFromFormat('d-m-Y', $value);
            $this->attributes['experience_from'] = $experience_from->format('Y-m-d');
        }
    }

    public function setExperienceToAttribute($value) {
        if ($value != '' && $value != null) {
            $experience_to = Carbon::createFromFormat('d-m-Y', $value);
            $this->attributes['experience_to'] = $experience_to->format('Y-m-d');
        }
    }
}
