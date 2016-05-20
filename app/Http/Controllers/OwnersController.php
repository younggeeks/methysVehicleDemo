<?php

namespace App\Http\Controllers;

use App\Owner;
use Illuminate\Http\Request;

use App\Http\Requests;






class OwnersController extends Controller
{


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     *
     * This returns all vehicle owners
     * This will also be used as route  ie: api/owners/index
     *
     */
    public function getIndex()
    {

        return Owner::all();
    }

}
