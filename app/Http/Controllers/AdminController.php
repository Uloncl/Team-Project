<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Game;

class AdminController extends Controller
{
	public function panel() {
		return view('admin-panel');
	}

	public function update() {
        set_time_limit(10000);
        $steamApps = json_decode(Http::get('https://api.steampowered.com/ISteamApps/GetAppList/v2/?access_token=c54705e41cc1c3bde731e3659aa55b67'))->applist->apps;
        $steamAppDetails = [];
        foreach($steamApps as $app) {
            $appid = $app->appid;
            $appDetails = json_decode(Http::get('https://store.steampowered.com/api/appdetails/', [
                'appids' => $appid, 
                'l' => 'english', 
                'cc' => 'EE']));
            if ($appDetails != null) {
                $appDetails = data_get($appDetails->$appid, 'data');
                dd($appDetails);
                $game = Game::create([
                    'steam_id' => $appid,
                    'type' => data_get($appDetails, 'type'),
                    'name' => data_get($appDetails, 'name'),
                ]);
            }
        }
		return view('admin-panel', compact('steamApps'));
	}
}
