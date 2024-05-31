<?php

namespace App\Http\Traits;

use App\Models\Account\UserConfirms;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

trait LoginConfirm
{
    public function userConfirmSave($getphone)
    {
        $phone = mb_substr(preg_replace("/[^0-9]/", "", $getphone), 1);
        $user_confirm = new UserConfirms();
        $user_confirm->phone = $phone;
        $code = mt_rand(1000, 9999);
        $user_confirm->code = $code;
        $user_confirm->session_id = Session::getId();
//        $response = Http::timeout(5)->get('https://api.mobizon.kz/service/message/sendsmsmessage?recipient=7' . $phone . '&text=Ваш+код+от+allu.kz: +' . $code . '%21&apiKey=kza34fad2b4a5af5ceb06322b4919a198bd41d6eb82ce0a579aef4326330e05c6a5b78');
//        if ($response->ok()) {
        $user_confirm->status = 1;
        $user_confirm->updated_at = Carbon::now();
        $user_confirm->save();
//        } else {
//            return redirect()->back()->withErrors('Повторите попытку');
//        }
    }
}
