<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main_Pages extends Model
{
 
    protected $fillable = ['Title','Content'];


    public function user(){
        
        return $this->belongsTo(User::class);
    }
    
}


