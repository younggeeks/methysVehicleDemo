<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public static $rules=[
        "first_name"=>"required",
        "last_name"=>"required",
        "email_address"=>"required|email",
        "contact_number"=>"required"
    ];
    protected $fillable=["first_name","last_name","email","contact_number"];

    public $timestamps=false;


    public function vehicles()
    {
        return $this->hasMany('App\Vehicle');
    }
}
