<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class business_profile extends Model
{
    use HasFactory;

    protected $table = 'business_profiles';
    protected $primaryKey = 'business_profile_id';
    public $timestamps = false;

    protected $fillable = [
        'business_profile_id',
        'shop_name',
        'shop_category',
        'country',
        'state',
        'shop_address',
        'GSTIN'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
