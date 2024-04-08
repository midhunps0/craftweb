<?php

namespace App\Http\Controllers;

use App\Services\AirpayService;
use Illuminate\Http\Request;
use Modules\Ynotz\SmartPages\Http\Controllers\SmartController;

class AirpayController extends SmartController
{
    public function transactionForm(Request $request, AirpayService $service)
    {
        return response()->json([
            'fields' => $service->airpayForm(
                $request->input('email'),
                $request->input('phone'),
                $request->input('name'),
                $request->input('sp_cd'),
                $request->input('cons_id'),
                $request->input('sdate'),
                $request->input('stime'),
                $request->input('sp_name'),
                $request->input('cons_name'),
            )
        ]);
    }

    public function airpayResponse(Request $request, AirpayService $service)
    {
        info('airpay response:');
        info($request->all());
        return $this->buildResponse(
            'airpay.response',
            $service->processResoponse($request->all())
        );
    }
}
