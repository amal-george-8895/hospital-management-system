<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $guarded = ['id'];

    public function department()
    {
        return $this->belongsToMany(Department::class);
    }
}
