<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'phone_no',
        'user_id',
    ];

    public function user() {
        $this->hasOne(User::class);
    }
}
