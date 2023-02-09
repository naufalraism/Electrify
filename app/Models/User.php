<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   use HasFactory;

   protected $guarded = ['id'];

   public function cart()
   {
      $this->hasMany(Cart::class);
   }

   public function scopeHasRole($query, $role)
   {
      return !empty($query->where('account_id', $this->account_id)->whereRelation('role', 'role_name', $role)->first());
   }
}
