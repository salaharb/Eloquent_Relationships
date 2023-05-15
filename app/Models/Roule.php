<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roule extends Model
{
    use HasFactory;
    protected $primaryKey = 'role_id'; // Replace 'role_id' with your actual primary key column name

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
}
