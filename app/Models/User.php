<?php

namespace App\Models;

use App\Traits\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /*
    |--------------------------------------------------------------------------
    | Traits
    |--------------------------------------------------------------------------
    */

    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use HasRoles;
    use QueryFilter;

    /*
    |--------------------------------------------------------------------------
    | Mass Assignable Attributes
    |--------------------------------------------------------------------------
    */

    protected $guarded = [];

    /*
    |--------------------------------------------------------------------------
    | Hidden Attributes
    |--------------------------------------------------------------------------
    */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /*
    |--------------------------------------------------------------------------
    | Attribute Casting
    |--------------------------------------------------------------------------
    */

    protected $casts = [
        'email_verified_at' => 'datetime',
        'ver_code_send_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Appended Attributes
    |--------------------------------------------------------------------------
    */

    protected $appends = [
        'profile_photo_url',
        'is_super_admin',
        'is_user',
        'fullname',
        'allPermissions',
        'allDirectPermissions',
        'allRoles',
    ];

    /*
    |--------------------------------------------------------------------------
    | Auto Eager Loading
    |--------------------------------------------------------------------------
    */

    protected $with = [
        'roles',
        'permissions'
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function fullname(): Attribute
    {
        return new Attribute(
            get: fn () => $this->first_name . ' ' . $this->last_name,
        );
    }

    protected function isSuperAdmin(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->hasRole('super_admin'),
        );
    }

    protected function isUser(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->hasRole('user') ?? true,
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Roles & Permissions
    |--------------------------------------------------------------------------
    */

    public function getAllRolesAttribute()
    {
        return $this->getRoleNames();
    }

    public function getAllDirectPermissionsAttribute()
    {
        return $this->getPermissionNames();
    }

    public function getAllPermissionsAttribute()
    {
        return $this->getAllPermissions()->map(function ($permission) {
            return $permission['name'];
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Query Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeDoesNotAdminUser($query)
    {
        $query->whereHas('roles', function ($query) {
            $query->whereNotIn('name', [
                'super_admin',
                'staff',
                'manager'
            ]);
        });
    }

    public function scopeOnlyAdminUser($query)
    {
        $query->whereHas('roles', function ($query) {
            $query->whereIn('name', [
                'super_admin',
                'staff',
                'manager'
            ]);
        });
    }

    public function scopeDoesNotHaveAdminRole($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('name', '!=', 'super_admin');
        });
    }

    public function scopeHasNotSuperAdmin($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('name', '!=', 'super_admin');
        });
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeBanned($query)
    {
        return $query->where('status', 0);
    }

    public function scopeEmailVerified($query)
    {
        return $query->where('ev', 1);
    }

    public function scopeEmailUnverified($query)
    {
        return $query->where('ev', 0);
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Get user's support tickets
     */
    public function tickets()
    {
        return $this->hasMany(SupportTicket::class);
    }
}