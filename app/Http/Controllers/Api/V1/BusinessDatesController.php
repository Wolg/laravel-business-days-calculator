<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetBusinessDateWithDelayRequest;

class BusinessDatesController extends Controller
{
    /**
     * @param GetBusinessDateWithDelayRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBusinessDateWithDelay(GetBusinessDateWithDelayRequest $request)
    {
        return response()->json([]);
    }
}
