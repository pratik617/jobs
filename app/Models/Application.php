<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Application extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile_number',
        'designation',
        'date_of_birth',
        'gender',
        'marital_staus',
        'address1',
        'address2',
        'city',
        'state',
        'pincode',
        
        'languages',

        'preferred_location',
        'department',
        'notice_period',
        'expected_ctc',
        'current_ctc',

        'status'
    ];

    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    public function setDateOfBirthAttribute($value) {
        if ($value != '' && $value != null) {
            $date_of_birth = Carbon::createFromFormat('d-m-Y', $value);
            $this->attributes['date_of_birth'] = $date_of_birth->format('Y-m-d');
        }
    }

    public function educationDetails() {
        return $this->hasMany(ApplicationEducationDetail::class);
    }

    public function workExperiences() {
        return $this->hasMany(ApplicationWorkExperience::class);
    }

    public function references() {
        return $this->hasMany(ApplicationReference::class);
    }

    public function technologies() {
        return $this->hasMany(ApplicationTechnology::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
