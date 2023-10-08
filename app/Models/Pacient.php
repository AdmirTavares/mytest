<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    protected $fillable =[
        'name',
        'surname',
        'birth',
        'placebirth',
        'address',
        'zipcode',
        'city',
        'user_id'
        
];


public function user(){
    return $this->belongsTo(User::class);
}

    use HasFactory;
}
