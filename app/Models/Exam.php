<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'exam';
    protected $date = 'deleted_at';
    
    protected $fillable = [
        'title',
        'date',
        'status',
        'admin_id',
    ];
    
    
    
    

}
