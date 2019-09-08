<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        );
        
    //Useモデルに関連付け
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    
    //Commentモデルに関連付け
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
