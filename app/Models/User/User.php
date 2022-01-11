<?php

namespace App\Models\User;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Facade\FlareClient\Concerns\HasContext;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Str;

use App\Http\Helpers\Nuage;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasContext, HasFactory, Notifiable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'picture_path', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the owning typable model.
     */
    public function typable()
    {
        return $this->morphTo();
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name; 
    }

    public function getPictureUrlAttribute()
    {
        if ( !$this->picture_path ) { return false; }
        return Nuage::getFileUrl( $this->picture_path );
    }

    public function getInitialsAttribute(): string
    {
        return Str::substr($this->first_name, 0, 1) . Str::substr($this->last_name, 0, 1);
    }

    public function routeNotificationForOneSignal()
    {
        return [ 'include_external_user_ids' => strval( $this->id ) ];
    }
    
}
