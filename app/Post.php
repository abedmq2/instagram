<?php

namespace App;

abstract class Post extends Lang
{
    //


//    abstract function getParam();

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {

            $model->type = get_called_class();
        });
    }

    protected $fillable=['sort'];

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->where('type', '=', get_called_class());
    }


    function getValidation($id)
    {
        $validation = [];

        foreach ($this->getParam() as $param) {
            if ($param[0] == 'image' && $id)
                continue;
            $validation[$param[0]] = ['required'];
        }
        return $validation;
    }


    function getValidationMessage()
    {
        return [];
    }

    function scopefilter($q)
    {
        return $q;
    }

    function addOther(){

    }


}
