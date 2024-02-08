<?php

namespace Modules\User\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Database\factories\UserFactory;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'user_name', 'user_pass', 'user_gender', 'user_phone'
    ];
    
    protected static function newFactory(): UserFactory
    {
        //return UserFactory::new();
    }
}
