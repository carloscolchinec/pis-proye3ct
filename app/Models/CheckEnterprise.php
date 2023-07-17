<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClientsEnterprise;

class CheckEnterprise extends Model implements Authenticatable
{
    protected $table = "tb_enterprise_users";
    
    use HasFactory;
    use AuthenticatableTrait;
    
    
    protected $fillable = [
        'username',
        'password',
    ];

    public function clients()
    {
        return $this->hasMany(ClientsEnterprise::class, 'enterprise_id', 'id');
    }
    
    

}
