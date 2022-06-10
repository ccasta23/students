<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * Oficial docs: https://laravel.com/docs/9.x/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = ['grade_name', 'grade_value_percentage', 'grade_deadline'];

    public function students()
    {
        return $this->belongsToMany(Student::class)
            ->withPivot('id', 'grade_student', 'created_at','updated_at');
    }
}
