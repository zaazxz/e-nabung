<?php

namespace App\Http\Controllers\Api\Helper;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ApiKeyController extends Controller
{
    public function generateApiKey(Request $request)
    {

        $enc = base64_encode($request->apiQuestion);

        if ($request->apiQuestion == 'Nenden Lusiani Nugraha') {
            return redirect('/')->withCookie(cookie('question_answered', $enc, 30));
        }

        return redirect('/');

    }

    public function deleteCookie()
    {
        Cookie::queue(Cookie::forget('question_answered'));
        return redirect('/');
    }

}
