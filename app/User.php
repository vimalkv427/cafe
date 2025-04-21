<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable; 
use App\Role;          // For Laravel 7 and below
use Carbon\Carbon;


class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'trial_end_date',
        'cpassword',
        'status',
        'shop_name',
        'address_line'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
  



    public function isSuperAdmin()
    {
        return $this->role && $this->role->name === 'Super Admin';
    }

    public function isAdmin()
    {
        return $this->role && $this->role->name === 'Admin';
    }
    
    public function isTrialExpired()
    {
        return $this->trial_end_date && Carbon::parse($this->trial_end_date)->isPast();
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'admin_id');
    }


    // Automatically deactivate users when retrieved if their trial is expired
    protected static function booted()
    {
        static::retrieved(function ($user) {
            if ($user->isTrialExpired()) {
                $user->update(['status' => 0]);
            }
        });
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

 




public function hasPermission($permission)
{
    return $this->role->permissions->contains('name', $permission);
}


}
