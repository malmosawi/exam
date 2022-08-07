<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Governorate extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'governorate';
    protected $date = 'deleted_at';


    protected $fillable = [
        'governorate',
    ];


}
