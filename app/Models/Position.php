<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    protected $fillable = [
        'role',
        'experience_required',
        'salary',
        'company_id',
        'person_id',
        'available'
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function person()
    {
        return $this->belongsTo(Person::class);
    }

}
