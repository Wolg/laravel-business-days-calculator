<?php
declare(strict_types=1);

namespace App\Services;
use Carbon\Carbon;

class BusinessDaysCalculatorService
{
    protected $initialDate;
    protected $businessDate;
    protected $delay;
    protected $holidays = 0;
    protected $weekends = 0;
    protected $totalDays = 0;

    /**
     * BusinessDaysCalculatorService constructor.
     */
    public function __construct()
    {
        // Force reset
        $this->holidays = 0;
        $this->weekends = 0;
        $this->totalDays = 0;
    }

    /**
     * @param $date
     * @param $delay
     * @return mixed
     */
    public function calculate(Carbon $date, int $delay) : self
    {
        $this->initialDate = $date;
        $this->delay = $delay;
        for (; $delay >= 0; $delay--) {
            $this->totalDays++;
            if ($this->isDateTheHoliday($date)) {
                $this->holidays++;
                continue;
            }
            if ($date->isWeekend()) {
                $this->weekends++;
                continue;
            }
            $date->addDay();
        }
        $this->businessDate = $date;
        return $this;
    }

    public function isDateTheHoliday($date) : bool
    {
        return in_array("{$date->englishMonth} {$date->day}", config('app.holidays.usa'));
    }

    public function getBusinessDate() : string
    {
        return $this->businessDate->toIso8601ZuluString();
    }

    public function getTotalDays() : int
    {
        return $this->totalDays;
    }

    public function getHolidayDays() : int
    {
        return $this->holidays;
    }

    public function getWeekendDays() : int
    {
        return $this->weekends;
    }
}
