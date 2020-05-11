<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class EazyAuthLoginController extends Controller
{
    public $integrationid = 'get integration id from eazyauth.com';
    public $secretkey = 'get secret key from eazyauth.com';

    public function startlogin()
    {
        return view('eazyauthlogin.login');
    }

    public function processlogin()
    {
        $validatedData = request()->validate([
            'useremail' => 'bail|required|email|max:191',
        ]);

        $response = Http::post('https://eazyauth.com/api/v2/user/find', [
            'useremail' => request()->useremail,
            'integrationid' => $this->integrationid,
            'secretkey' => $this->secretkey,
        ]);
        $userid = intval($response->body());
        if ($userid > 0) {
            $emailentered = request()->useremail;
            return view('eazyauthlogin.verify', [
                'emailentered' => $emailentered,
                'erroroccured' => false,
                'secretkeymatched' => false,
                'userid' => $userid,
            ]);
        } else {
            return 'An error occurred';
        }
        return 'An error occurred';
    }

    public function processverify()
    {
        $validatedData = request()->validate([
            'useremail' => 'bail|required|email|max:191',
            'secretkeyentered' => 'bail|required|max:20',
        ]);

        $response = Http::post('https://eazyauth.com/api/v2/user/verify', [
            'useremail' => request()->useremail,
            'integrationid' => $this->integrationid,
            'secretkey' => $this->secretkey,
            'secretkeyentered' => request()->secretkeyentered,
        ]);
        $emailentered = request()->useremail;
        $userid = request()->userid;
        if ($response->body() == "1") {
            return view('eazyauthlogin.verify', [
                'emailentered' => $emailentered,
                'erroroccured' => false,
                'secretkeymatched' => true,
                'userid' => $userid,
            ]);
        } else {
            return view('eazyauthlogin.verify', [
                'emailentered' => $emailentered,
                'erroroccured' => true,
                'secretkeymatched' => false,
                'userid' => $userid,
            ]);
        }
    }
}
