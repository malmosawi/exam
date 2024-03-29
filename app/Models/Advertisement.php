<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Advertisement extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'advertisement';
    protected $date = 'deleted_at';
    protected $fillable = [
        'title',
        'content',
        'date',
        'status',
        'admin_id',
    ];


}
