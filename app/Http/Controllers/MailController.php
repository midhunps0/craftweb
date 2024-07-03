<?php

namespace App\Http\Controllers;

use App\Services\MailService;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function contactMail(Request $request, MailService $service)
    {
        try {
            return response()->json([
                'success' => $service->contactMail($request->only([
                    'name',
                    'email',
                    'message'
                ]))
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'error' => $e->__toString()
            ]);
        }
    }
}
