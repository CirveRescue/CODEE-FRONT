<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Permite asignar valores a estos campos usando mass assignment
    protected $fillable = ['name'];


    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
}
