<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //

    protected $fillable = ['category_id','instagram_id','shortCode','type','imageThumbnailUrl','imageHighResolutionUrl','caption','account_id'];

    function category(){
        return $this->belongsTo(Category::class);
    }
    function account(){
        return $this->belongsTo(Account::class);
    }
    function scopeSearch($q,$search){
        if($search){
            $q->where('caption','like','%'.$search.'%');
        }

        if(request('category_id')){
            $q->where('category_id',request('category_id'));
        }
        if(request('account_id')){
            $q->where('account_id',request('account_id'));
        }
    }
}
