<?php

namespace App\Http\Controllers;

use App\Owner;
use App\Vehicle;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SoapBox\Formatter\Formatter;
use Symfony\Component\HttpFoundation\Response;

class VehicleApiController extends Controller
{

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $vehicles = Vehicle::all();

        return $vehicles;
    }


    public function show($id)
    {
        $format=$this->request->input("format");

        $vehicle = Vehicle::with("owner")->where("id", $id)->first();
        if(isEmpty($vehicle)){
            return response()->json([
                "message" => "The Resource is not found "
            ]);
        }

        if($format==null | $format=="json"){
            return $vehicle;
        }elseif($format=="xml") {
            $formatter = Formatter::make($vehicle, Formatter::JSON);
            return $formatter->toXml();
        }else{
            return response()->json([
                "message" => "Unsupported format , user json or xml"
            ]);
        }
    }


    public function update($id)
    {

        $vehicle = Vehicle::find($id);

        $vehicle->update($this->request->except("token"));

        return response()->json([
            "message" => "Vehicle Information Updated Successfully"
        ]);

    }

    public function store()
    {
        $vehicleValidator = Validator::make($this->request->all(), Vehicle::$rules);

        if ($vehicleValidator->passes()) {


            //storing user input into an array $data
            $data = $this->request->all();

            //first saving vehicle owner information
            $owner = Owner::create([
                "first_name" => $data["first_name"],
                "last_name" => $data["last_name"],
                "email" => $data["email_address"],
                "contact_number" => $data["contact_number"],
            ]);

            //if owner is saved then save the vehicle and insert owner's Id
            if ($owner) {
                Vehicle::create([
                    "manufacturer" => $data["manufacturer"],
                    "color" => $data["color"],
                    "millage" => $data["millage"],
                    "year" => $data["year"],
                    "type" => $data["type"],
                    "owner_id" => $owner->id
                ]);


                return response()->json([
                    "message" => "Vehicle Saved Succesfully",
                    "code"=>200
                ]);


            }
        }
        return response()->json([
            "message" => "validation failed",
            "errors" => $vehicleValidator->errors()
        ]);

    }

    public function destroy($id)
    {
        $vehicle=Vehicle::withTrashed()->find($id);

        if($vehicle){
            if($vehicle->trashed())
            {
                return response()->json([
                    "message" => "Vehicle  Is Already In The Trash"
                ]);
            }
            Vehicle::destroy($id);
            return response()->json([
                "message" => "Vehicle  Was Moved To Trash Successfully",
                "code"=>200
            ]);
        }

        return response()->json([
            "message" => "Vehicle  Deletion Failed ! No Vehicle with id ".$id." was Found"
        ]);



    }
}


