<?php

namespace App\Http\Controllers;

use App\Services\BookingService;
use Illuminate\Http\Request;
use Modules\Ynotz\SmartPages\Http\Controllers\SmartController;

class BookingController extends SmartController
{
    public function bookingPage(BookingService $service)
    {

        return $this->buildResponse(
            'pagetemplates.booking',
            $service->initData()
        );
    }

    public function dates(Request $request, BookingService $service)
    {
        return response()->json(
            $service->fetchDates(
                $request->input('SP_CD'),
                $request->input('CONS_ID')
            )
        );
    }

    public function slots(Request $request, BookingService $service)
    {
        return response()->json(
            $service->fetchSlots(
                $request->input('SP_CD'),
                $request->input('CONS_ID'),
                $request->input('SELECTED_DATE'),
            )
        );
    }
}
