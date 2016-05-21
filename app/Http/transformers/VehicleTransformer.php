<?php
/**
 * Created by IntelliJ IDEA.
 * User: Samjunior
 * Date: 20/05/2016
 * Time: 3:22 PM
 */

namespace app\Http\transformers;


use League\Fractal\TransformerAbstract;

class VehicleTransformer extends TransformerAbstract
{
    public function transform(Vehicle $vehicle)
    {
        return [
            "id"=>int($vehicle->id),
            "manufacturer"=>$vehicle->manufacturer,
            "color"=>$vehicle->color,
            "millage"=>$vehicle->millage,
            "year"=>$vehicle->year,
            "type"=>$vehicle->type,
            "owner_id"=>$vehicle->owner_id,
            'created_at' => $vehicle->created_at,
            'updated_at' => $vehicle->updated_at
        ];
    }

}
