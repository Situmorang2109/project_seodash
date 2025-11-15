<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name','email','password','role'];

    protected $hidden = ['password','remember_token'];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function userTransactions()
    {
        return $this->hasMany(UserTransaction::class);
    }
}
