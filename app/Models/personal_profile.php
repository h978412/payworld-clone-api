<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personal_profile extends Model
{
    use HasFactory;

    protected $table = 'personal_profiles';
    protected $primaryKey = 'personal_profile_id';
    public $timestamps = false;

    protected $fillable = [
        'personal_profile_id',
        'gender',
        'date_of_birth',
        'marital_status',
        'education',
        'country',
        'state',
        'address',
        'pincode'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
