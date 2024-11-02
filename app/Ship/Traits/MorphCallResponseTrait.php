<?php

namespace App\Ship\Traits;

use Illuminate\Pagination\LengthAwarePaginator;

Class MorphCallResponseTrait
{
    /**
     * 
     */
    public function MorphCall(array $ResponseCall): mixed
    {
        $data = $this->data($ResponseCall);
        if (empty($ResponseCall)) {
            $data['errors'] = $this->NullArrayResponse();
        }
        return $data;
    }

    public function PaginatedMorphCall(LengthAwarePaginator $paginatedData): mixed
    {
        $ResponseCall = $paginatedData->toArray();
        $data = $this->data($ResponseCall);
        if (empty($ResponseCall['data'])) {
            $data['errors'] = $this->NullArrayResponse();
        }
        return $data;
    }

    public function data($ResponseCall){
        $morphed = [
            'response' => $ResponseCall
        ];

        return $morphed;
    }
}
