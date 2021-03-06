<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;


class SettingController extends Controller
{
    public function general()
    {
        return view('backend.settings.general');
    }

    public function generalUpdate(Request $request)
    {

        $this->validate($request,[
           'site_title' =>'required|string|min:2|max:255',
           'site_description' =>'nullable|string|min:5|max:255',
           'site_address' =>'nullable|string|min:2|max:255'
        ]);

        Setting::updateOrCreate(['name' => 'site_title'],['value' => $request->get('site_title')]);
//        update.env
        Artisan::call('env:set APP_NAME="'.$request->site_title.'"');
        Setting::updateOrCreate(['name' => 'site_description'],['value' => $request->get('site_description')]);
        Setting::updateOrCreate(['name' => 'site_address'],['value' => $request->get('site_address')]);
        notify()->success('Settings updated','Success');
        return back();
    }

    public function appearance()
    {
        return view('backend.settings.appearance');
    }
    public function appearanceUpdate(Request $request)
    {
        $this->validate($request,[
            'site_logo' =>'nullable|image',
            'favicon' =>'nullable|image',

        ]);
//        update logo
        if ($request->hasFile('site_logo')){
            $this->deleteOldLogo(\setting('site_logo'));
            Setting::updateOrCreate(
                ['name' => 'site_logo'],
                ['value' => Storage::disk('public')->putFile('logos',$request->file('site_logo'))]
            );
        }
        if ($request->hasFile('favicon')){
            $this->deleteOldLogo(\setting('favicon'));
            Setting::updateOrCreate(
                ['name' => 'favicon'],
                ['value' => Storage::disk('public')->putFile('logos',$request->file('favicon'))]
            );
        }
        notify()->success('Settings updated','Success');
        return back();
    }
    private function deleteOldLogo($path){
        if (Storage::disk('public')->exists($path)){
            Storage::disk('public')->delete($path);
        }
    }

    public function mail()
    {
        return view('backend.settings.mail');
    }

    public function mailUpdate(Request $request)
    {

        $this->validate($request,[
            'mail_mailer' =>'string|max:255',
            'mail_host' =>'nullable|string',
            'mail_port' =>'nullable|string',
            'mail_username' =>'nullable|email',
            'mail_password' =>'nullable|string',
            'mail_encryption' =>'nullable|string',
            'mail_from_address' =>'nullable|string',
            'site_address' =>'nullable|string|email'
        ]);

        Setting::updateOrCreate(['name' => 'mail_mailer'],['value' => $request->get('mail_mailer')]);
        Artisan::call('env:set MAIL_MAILER="'.$request->get('mail_mailer').'"');

        Setting::updateOrCreate(['name' => 'mail_host'],['value' => $request->get('mail_host')]);
        Artisan::call('env:set MAIL_HOST="'.$request->get('mail_host').'"');

        Setting::updateOrCreate(['name' => 'mail_port'],['value' => $request->get('mail_port')]);
        Artisan::call('env:set MAIL_PORT="'.$request->get('mail_port').'"');

        Setting::updateOrCreate(['name' => 'mail_username'],['value' => $request->get('mail_username')]);
        Artisan::call('env:set MAIL_USERNAME="'.$request->get('mail_username').'"');

        Setting::updateOrCreate(['name' => 'mail_password'],['value' => $request->get('mail_password')]);
        Artisan::call('env:set MAIL_PASSWORD="'.$request->get('mail_password').'"');

        Setting::updateOrCreate(['name' => 'mail_encryption'],['value' => $request->get('mail_encryption')]);
        Artisan::call('env:set MAIL_ENCRYPTION="'.$request->get('mail_encryption').'"');

        Setting::updateOrCreate(['name' => 'mail_from_address'],['value' => $request->get('mail_from_address')]);
        Artisan::call('env:set MAIL_FROM_ADDRESS="'.$request->get('mail_from_address').'"');

        Setting::updateOrCreate(['name' => 'mail_from_name'],['value' => $request->get('mail_from_name')]);
        Artisan::call('env:set MAIL_FROM_NAME="'.$request->get('mail_from_name').'"');

        notify()->success('Settings updated','Success');
        return back();
    }

    public function socialite()
    {
        return view('backend.settings.socialite');
    }
    public function socialiteUpdate(Request $request){
        $this->validate($request,[
            'google_client_id' => 'string|min:3|nullable',
            'google_client_secret' => 'string|min:3|nullable',
            'github_client_id' => 'string||min:3|nullable',
            'github_client_secret' => 'string||min:3|nullable',
        ]);

        Setting::updateOrCreate(['name' => 'google_client_id'],['value' => $request->get('google_client_id')]);
        Artisan::call('env:set GOOGLE_CLIENT_ID="'.$request->get('google_client_id').'"');

        Setting::updateOrCreate(['name' => 'google_client_secret'],['value' => $request->get('google_client_secret')]);
        Artisan::call('env:set GOOGLE_CLIENT_SECRET="'.$request->get('google_client_secret').'"');

        Setting::updateOrCreate(['name' => 'github_client_id'],['value' => $request->get('github_client_id')]);
        Artisan::call('env:set GITHUB_CLIENT_ID="'.$request->get('github_client_id').'"');

        Setting::updateOrCreate(['name' => 'github_client_secret'],['value' => $request->get('github_client_secret')]);
        Artisan::call('env:set GITHUB_CLIENT_SECRET="'.$request->get('github_client_secret').'"');

        notify()->success('Settings updated','Success');
        return back();

    }


}
