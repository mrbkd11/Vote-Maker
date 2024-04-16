<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'is_active',
        'admin_id'
    
    ];
     public function results()
    {
        return $this->hasMany(Result::class);
    }
}
