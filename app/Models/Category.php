<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
