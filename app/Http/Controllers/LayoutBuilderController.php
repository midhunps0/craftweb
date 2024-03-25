<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutBuilderController extends Controller
{
    public function getPreview(Request $request)
    {
        return response()->json(
            [
                'preview_html' => view('lyout-preview', ['content' => json_decode($request->input('content'))])->render()
            ]
        );
    }
}
