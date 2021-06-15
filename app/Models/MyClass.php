<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyClass extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = ['code', 'name', 'maximum_students', 'status', 'description'];

    public function students()
    {
        return $this->hasMany(Student::class, 'class');
    }
    
}
