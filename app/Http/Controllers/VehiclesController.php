<?php

namespace App\Http\Controllers;

use App\Owner;
use App\Vehicle;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class VehiclesController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request=$request;
    }



    public function home()
    {
        //fetching all vehicles with their respective owners
        $vehicles=Vehicle::with("owner")->get();
        $deleted=Vehicle::onlyTrashed()->get();

        return view("home",[
            "vehicles"=>$vehicles,
            'deleted'=>$deleted
        ]);
    }




    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * This will return view create which will have the form to register a new vehicle as well
     * as the owner of the vehicle
     *
     */
    public function getCreate()
    {
        return view("vehicles.create");
    }

    public function postCreate()
    {

        //validating user inputs using $vehicleRules variable which i defined in Vehicle Model
        //should validation fail it will redirect user back to the form
     $this->validate($this->request,Vehicle::$rules);



        //storing user input into an array $data
        $data=$this->request->all();

        //first saving vehicle owner information
        $owner=Owner::create([
            "first_name"=>$data["first_name"],
            "last_name"=>$data["last_name"],
            "email"=>$data["email_address"],
            "contact_number"=>$data["contact_number"],
        ]);

        //if owner is saved then save the vehicle and insert owner's Id
        if($owner){
            $vehicle=Vehicle::create([
                "manufacturer"=>$data["manufacturer"],
                "color"=>$data["color"],
                "millage"=>$data["millage"],
                "year"=>$data["year"],
                "type"=>$data["type"],
                "owner_id"=>$owner->id
            ]);

            //after saving owner and vehicle redirect to vehicles list page with flash message
            alert()->success('Vehicle Has Been Saved Successfully');
            return Redirect::to("/");
        }

        //this will be fired only if owner was not saved
        return Redirect::back()->with("failure","An Error Occured Vehicle Could not be saved!");


    }




    public function getView($id)
    {
       $vehicle=Vehicle::withTrashed()->find($id);
        return view("vehicles.view",[
            "vehicle"=>$vehicle
        ]);
    }

    public function deleteDelete($id)
    {
        Vehicle::destroy($id);
        alert()->success('Vehicle Deleted Successfully');
        return Redirect::back();
    }

    public function getEdit($id)
    {
        $vehicle=Vehicle::find($id);
        return view("vehicles.update",[
            "vehicle"=>$vehicle
        ]);
    }

    public function patchUpdate($id)
    {
        $this->validate($this->request,Vehicle::$rules);

        $vehicle=Vehicle::find($id);

        //storing user input into an array $data
        $data=$this->request->all();

        $vehicle->manufacturer=$data["manufacturer"];
        $vehicle->color=$data["color"];
        $vehicle->millage=$data["millage"];
        $vehicle->year=$data["year"];
        $vehicle->type=$data["type"];
        $vehicle->save();

        //updating vehicle owner information
        $vehicle->owner->first_name=$data["first_name"];
        $vehicle->owner->last_name=$data["last_name"];
        $vehicle->owner->email=$data["email_address"];
        $vehicle->owner->contact_number=$data["contact_number"];
        $vehicle->owner->save();



            //after Updating owner and vehicle redirect to vehicles list page with flash message
        alert()->success('Vehicle Information Updated Successfully');
        return Redirect::to("/");
        }


    public function getRestore($id)
    {
        //getting deleted Vehicle Object
       $deleted=Vehicle::withTrashed()->where("id",$id)->first();

        //restoring selected vehicle
        $deleted->restore();

        alert()->success('Vehicle Restored Successfully');
        return Redirect::to("/");

    }



}
