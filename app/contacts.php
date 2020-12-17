<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
     protected $fillable = [
         'name', 'email', 'subject', 'mobile_number', 'message'
     ];
}
