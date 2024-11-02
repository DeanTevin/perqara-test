<?php
namespace App\Ship\Monitoring\ActivityLog\Traits;

use App\Ship\Enums\LogLevelEnums;
use App\Ship\Monitoring\ActivityLog\Helpers\GeneralLogger;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Activitylog\Contracts\Activity;

/**
 * ValidationTraitsLog trait class that handles logging on validation request
 * 
 * @used-by App\Ship\Traits\ValidationTraits as traits.
 * 
 * @method void LogRequestValidation(Request $request, array|null $failedResults = null)
 *          A callable method for logging a validation class.
 */
trait ValidationTraitsLog
{
    /**
     * Log request validation.
     *
     * @param \Illuminate\Http\Request $request The request object.
     * @param array|null $failedResults The failed results (default: null).
     * @uses App\Ship\Monitoring\ActivityLog\Helpers\GeneralLogger as Helper Function
     *
     * @return void
     */
    public function LogRequestValidation(Request $request,array $failedResults = null)
    {  
        // Get Logging Values
        $LogValues = [
            'class' => get_class($this),
            'request' => get_class($request),
            'route' => $request->url(),
            'payload' => $request->all(),
            'failedResults' => $failedResults
        ];
        
        if($failedResults != null){
            //Log as Notice on failed validation
            GeneralLogger::notice('Failed Request Validation', 'Monitoring Validation Request from Routes', $LogValues);

        }else{
            //Log as Informational on successful validation
            GeneralLogger::info('Request Validation', 'Monitoring Validation Request from Routes', $LogValues);
        }
    }
}