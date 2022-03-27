<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    use HasFactory;

    protected $table = 'documents';
    protected $primaryKey = 'document_id';
    public $timestamps = false;

    protected $fillable = [
        'document_id',
        'PAN',
        'AADHAR'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
