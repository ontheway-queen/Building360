<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   public function permissions()
   {

      return $this->belongsToMany(Permission::class, 'roles_permissions', 'role_id');
   }

   public function users()
   {
      return $this->belongsToMany(User::class, 'users_roles', 'role_id');
   }
}
