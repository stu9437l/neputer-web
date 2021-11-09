<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
      protected $fillable = [
        'name', 'role','description','images'
      ];
}