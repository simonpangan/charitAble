<?php

namespace App\Models;

use App\Models\Log;
use App\Models\Benefactor;
use App\Models\Charity\Charity;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    
    protected $guarded = [];

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

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function createLog(String $activity): void
    {
        $this->logs()->save(
            new Log(['activity' => $activity])
        );
    }

    public function createLoginLog(): void
    {
        $this->createLog('You have login into our application');
    }

    public function benefactor()
    {
        return $this->hasOne(Benefactor::class, 'id');
    }

    public function withBenefactor()
    {
        return $this->setRelation('benefactor', Benefactor::find(Auth::id()));
    }

    public function charity()
    {
        return $this->hasOne(Charity::class, 'id');
    }

    public function withCharity()
    {
        return $this->setRelation('charity', Charity::find(Auth::id()));
    }

    public function getIsAllowedToDownloadAttribute() {
        return (now()->diffInMinutes($this->last_generate_report)) > 5 ? true : false;
    }
}
