<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
  
    use SoftDeletes, Notifiable, Auditable, HasFactory;

    public $table = 'users';

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const USER_TYPE_SELECT = [
        'staff'    => 'Staff',
        'seller'   => 'Seller',
        'customer' => 'Customer',
    ];
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'email_verified_at',
        'remember_token',
        'country',
        'phone',
        'identity_number',
        'commercial_register',
        'approved',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function userUserAlerts()
    {
        return $this->belongsToMany(UserAlert::class);
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function whitelist()
    {
        return $this->hasMany(Whitelist::class);
    }

    // countries
    public const CITY_SELECT = [
        'Suadia' => 'السعوديه',
    ];

    // areas 
    public const AREA_SELECT = [
        'Ryad' => 'الرياض',
        'Jaddah' => 'جدة',
        'Makkah' => 'مكة المكرمة',
        'Madinah' => 'المدينة المنورة',
        'Dammam' => 'الدمام',
        'Khobar' => 'الخبر',
        'Taif' => 'الطائف',
        'Jubail' => 'الجبيل',
        'KhamisMushait' => 'خميس مشيط',
        'ArRass' => 'الرس',
    ];
}
