<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;
    protected $fillable = ['name','describe','user_id','belongto','total_staff','current_staff'];
    public function user(){

        return $this->belongsTo(User::class);
    }


    public function profiles(){

        return  $this->hasMany(contactinfo::class)->orderBy('id', 'ASC');
    }

    public function belongt(){

        return $this->belongsTo(profile::class,'belongto');
    }


}
