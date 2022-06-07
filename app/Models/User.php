<?php

namespace App\Models;

use App\Models\Log;
use App\Models\Benefactor;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    
    protected $fillable = [
        // 'city', ?
        'role_id',
        'email',
        'password',
        'email_verified_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new CustomVerifyEmail);
    }

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new CustomResetPassword($token));
    }


    //RELATIONSHIPS

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function createLog(String $activity): void
    {
        $this->logs()->save(
            new Log(['activity' => $activity])
        );
    }

    public function benefactor()
    {
        return $this->hasOne(Benefactor::class, 'id');
    }
}
