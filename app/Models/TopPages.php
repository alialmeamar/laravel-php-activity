<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopPages extends Model
{

    use HasFactory;
    protected $fillable = ['Title','Content'];
    public function user(){

        return $this->belongsTo(User::class);
    }

}
