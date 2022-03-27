<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class point extends Model
{
    use HasFactory;
    protected $table = 'points';
    protected $primaryKey = 'point_id';
    public $timestamps = false;
    
    protected $fillable = [
        'point_id',
        'date',
        'forgot_password_points',
        'login_points',
        'referal_points'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
