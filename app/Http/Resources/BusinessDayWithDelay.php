<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessDayWithDelay extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'ok' => true,
            'initialQuery' => $request->all(),
            'results' => [
                'businessDate' => $this->resource->getBusinessDate(),
                'totalDays' => $this->resource->getTotalDays(),
                'holidayDays' => $this->resource->getHolidayDays(),
                'weekendDays' => $this->resource->getWeekendDays(),
            ]
        ];
    }
}
