<?php

namespace App\Models;

use App\Traits\Memoization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;


class Role extends SpatieRole
{
    use HasFactory,  Memoization;

    /**
     * Get "Administrator" Role
     */
    public static function administrator(): Role
    {
        return static::staticMemo('role.administrator', function () {
            $name = config('permission.defaults.roles.administrator.name');
            return self::where('name', $name)->firstOrFail();

        });
    }

    public function addRecord()
    {

        request()->validate([
            'name' => ['required']
        ]);

        $this->create(request()->all());

        $this->syncPermissions(request()->role_permissions);

        return $this;
    }

    public function updateRecord()
    {
        request()->validate([
            'name' => ['required']
        ]);

        $this->update(request()->all());

        $this->syncPermissions(request()->permissions);

        return $this;
    }


}
