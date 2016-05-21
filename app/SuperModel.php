<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperModel extends Model
{
    public function update(Array $attributes = array(), array $options = Array()){
        foreach($attributes as $key => $value){
            if(!is_null($value)) $this->{$key} = $value;
        }
        return $this->fill($attributes)->save();
    }

}
