<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    function category(){
        return $this->belongsTo(Category::class);
    }

    function scopeSearch($q,$search = ''){

        if($search){
            $q->where('name','like','%'.$search.'%');
        }

        if(request('category_id')){
            $q->where('category_id',request('category_id'));
        }
    }
}
