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
      return $this->hasMany(Cart::class);
   }

   public function role()
   {
      return $this->belongsTo(Role::class);
   }

   public function scopeHasRole($query, $role)
   {
      return !empty($query->where('id', $this->id)->whereRelation('role', 'name', $role)->first());
   }
}
