<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'comment' => 'required',
        );

    //Userモデルに関連付け
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    //Groupモデルに関連付け
    public function group()
    {
        return $this->belongsTo('App\Group');
    }
    
}
