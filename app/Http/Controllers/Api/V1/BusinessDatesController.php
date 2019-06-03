<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;

class BusinessDatesController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBusinessDateWithDelay(Request $request)
    {
        return response()->json([]);
    }
}
