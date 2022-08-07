<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamTrack extends Model
{
    use HasFactory;

    protected $table = 'exam_track';

    protected $fillable = [
                            'user_id',
                            'exam_id',
                            'stage_1',
                            'stage_2',
                            'stage_3',
                            'stage_4',
                            'stage_5',
                            'stage_6',
                            'stage_7',
                            'stage_8',
                            'stage_9',
                            'stage_10',
                            'stage_11',
                            'exam', 
                        ];
}
