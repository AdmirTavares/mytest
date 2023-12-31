<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
   
   protected $fillable =[
        'answer',
        'question',
        'number',
        'user_id',
];

public function user(){
    return  $this->belongsTo(User::class);
}
    use HasFactory;
}
