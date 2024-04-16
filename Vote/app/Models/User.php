<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\VerifyApiEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Laravel\Fortify\TwoFactorAuthenticatable;
class User extends Authenticatable implements MustVerifyEmail,CanResetPasswordContract
{
    use TwoFactorAuthenticatable,HasApiTokens, HasFactory, Notifiable,CanResetPassword;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function sendApiEmailVerificationNotification()

{

$this->notify(new VerifyApiEmail); // my notification

}
 public function isAdmin()
    {
        return DB::table('admins')->where('email', $this->email)->exists();
    }
    

}
