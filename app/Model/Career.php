<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $table = 'career';

    protected $fillable = [
        'title', 'requirement_experience', 'status', 'skills', 'overview', 'priority',
        'jobType', 'jobLevel', 'company', 'location', 'salary', 'deadline_to_apply'
    ];

}