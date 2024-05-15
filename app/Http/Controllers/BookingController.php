<?php

namespace App\Http\Controllers;

use App\Services\BookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Modules\Ynotz\SmartPages\Http\Controllers\SmartController;

class BookingController extends SmartController
{
    private $service;
    public function __construct(BookingService $service)
    {
        $this->service = $service;
    }

    public function bookingPage($locale)
    {
        try {
            App::setlocale($locale);
            if (!$this->service->solverOk) {
                return $this->buildResponse(
                    'pagetemplates.booking',
                    [
                        'success' => false,
                        'error' => 'Booking Server Not Vailable.'
                    ]
                );
            }
            $data = $this->service->initData();
            return $this->buildResponse(
                'pagetemplates.booking',
                $data
            );
        } catch (\Throwable $e) {
            return $this->buildResponse(
                'pagetemplates.booking',
                [
                    'success' => false,
                    'error' => $e->__toString()
                ]
            );
        }
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
