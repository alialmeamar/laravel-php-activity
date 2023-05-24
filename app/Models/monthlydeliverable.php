<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monthlydeliverable extends Model
{
    use HasFactory;

    protected $fillable = ['Title','pdffile','Content'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
