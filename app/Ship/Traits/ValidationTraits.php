<?php
namespace App\Ship\Traits;

use App\Ship\Monitoring\ActivityLog\Traits\ValidationTraitsLog;
use App\Ship\Parents\Requests\Request;

/**
 * ValidationTraits trait class that handles validation request
 * 
 * @uses App\Ship\Monitoring\ActivityLog\Traits\ValidationTraitsLog as Traits
 * 
 * @method array|null RequestValidation a callable method for validating request
 */
trait ValidationTraits
{
    use ValidationTraitsLog;

    /**
     * RequestValidation is for validating request that comes from routes, can be applied in controllers
     *
     * @param Request $request is a App\Ship\Parents\Requests\Request object with validation methods.
     *
     * @return array|null  $result can be null or array with key of ['errors'] and ['code']
     *                      The ['errors'] value is from validator message and ['code'] value is http status code
     *                      if null, then the validation passed sucessfully.
     */
    public function RequestValidation(Request $request) : array|null 
    {  
        $result = null;
        if (isset($request->validator) && $request->validator->fails()){
            $result['errors']=$request->validator->getMessageBag();
            $result['code']='400';  
        }

        $this->LogRequestValidation($request,$result);
        return $result;
    }
}