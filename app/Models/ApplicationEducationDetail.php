<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ApplicationEducationDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',
        'examination',
        'course_name',
        'awarding_body',
        'passing_year',
        'percentage'
    ];

    public function setPassingYearAttribute($value) {
        if ($value != '' && $value != null) {
            $year = Carbon::createFromFormat('Y', $value);
            $this->attributes['passing_year'] = $year->format('Y-m-d');
        }
    }

}
