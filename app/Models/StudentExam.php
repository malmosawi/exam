<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class StudentExam extends Model
{
    use HasFactory;

    protected $table = 'student_exam';

    protected $fillable = [
        'user_id',
        'exam_id',
    ];
    
    
    
    

}
