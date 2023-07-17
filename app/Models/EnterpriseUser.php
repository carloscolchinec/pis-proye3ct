<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnterpriseUser extends Model
{
    use HasFactory;

    protected $table = 'tb_enterprise_users';

    protected $fillable = [
        'name_enterprise',
        'username',
        'password',
    ];


    
}
