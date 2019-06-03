<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetBusinessDateWithDelayRequest;
use App\Http\Resources\BusinessDayWithDelay;
use App\Services\BusinessDaysCalculatorService;
use Carbon\Carbon;

class BusinessDatesController extends Controller
{
    /**
     * @var BusinessDaysCalculatorService
     */
    protected $service;

    /**
     * BusinessDatesController constructor.
     * @param BusinessDaysCalculatorService $service
     */
    public function __construct(BusinessDaysCalculatorService $service)
    {
        $this->service = $service;
    }

    /**
     * @param GetBusinessDateWithDelayRequest $request
     * @return BusinessDayWithDelay
     */
    public function getBusinessDateWithDelay(GetBusinessDateWithDelayRequest $request)
    {
        $result = $this->service->calculate(
            Carbon::parse($request->get('initialDate')),
            $request->get('delay')
        );
        return new BusinessDayWithDelay($result);
    }
}
