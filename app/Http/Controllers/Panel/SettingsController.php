<?php

namespace App\Http\Controllers\Panel;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{


    public function index()
    {
        $data['title'] = __('Settings');
        return view('panel.settings',$data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        if ($file = $request->file('site_logo')){
            $data['site_logo'] = $file->move(public_path() , 'logo.png');
        }

        Setting::setSetting($data);

        return back();
    }


}
