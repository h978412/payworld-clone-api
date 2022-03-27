<?php

namespace App\Models;

use App\Models\point;
use App\Models\business_profile;
use App\Models\personal_profile;
use App\Models\document;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use  HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $fillable =[
        'firstName',
        'lastName',
        'email',
        'phone',
        'password',
        'referedBy'
    ] ;

    public function point()
    {
        return $this->hasMany(point::class.'user_id');
    }

    public function business_profile()
    {
        return $this->hasOne(Phone::class);
    }

    public function personal_profile()
    {
        return $this->hasOne(personal_profile::class);
    }

    public function document()
    {
        return $this->hasOne(document::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
   

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
   
}
