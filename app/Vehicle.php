<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed id
 * @property mixed manufacturer
 * @property mixed color
 * @property mixed millage
 * @property mixed year
 * @property mixed type
 * @property mixed owner_id
 * @property mixed created_at
 * @property mixed updated_at
 */
class Vehicle extends SuperModel
{
    use SoftDeletes;

    public static  $rules=[
        "manufacturer"=>"required",
        "color"=>"required",
        "millage"=>"required",
        "year"=>"required|numeric",
        "type"=>"required",
        "first_name"=>"required",
        "last_name"=>"required",
        "email_address"=>"required|email",
        "contact_number"=>"required"
    ];

    public $dates=["deleted_at"];

    protected $fillable=["manufacturer","color","millage","year","type","owner_id"];


    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }

}
