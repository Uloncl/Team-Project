<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Game;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\NewAccessToken;

class AdminController extends Controller
{
	public function panel() {
		return view('admin-panel');
	}

	public function update() {
        set_time_limit(10000000);
        $steamApps = json_decode(Http::get('https://api.steampowered.com/ISteamApps/GetAppList/v2/?access_token=c54705e41cc1c3bde731e3659aa55b67'))->applist->apps;
        $gamesRequest = DB::table('games')->get('steam_id');
        $existingApps = [];
        foreach ($gamesRequest as $game) {
            $existingApps[] = $game->steam_id;
        }
        $newApps = [];
        foreach($steamApps as $app){
            if (!in_array($app->appid, $existingApps)) {
                $newApps[] = $app->appid;
            }
        }
        Log::info($newApps);
        $steamAppDetails = [];
        foreach($newApps as $appid) {
            $appDetails = json_decode(Http::get('https://store.steampowered.com/api/appdetails/', [
                'appids' => $appid, 
                'l' => 'english', 
                'cc' => 'EE']), true);
            if ($appDetails != null) {
                $appDetails = $appDetails[$appid];
                $appSuccess = $appDetails['success'];
                if ($appSuccess == true) {
                    $appData = $appDetails['data'];
                    $steamAppDetails[] = $appData;
                    Log:info($appData);
                    if (Validator::make($appData, [
                        'type' => 'required',
                        'name' => 'required'
                    ])) {
                        $game = Game::create([
                            'steam_id' => $appid,
                            'type' => data_get($appData, 'type'),
                            'title' => data_get($appData, 'name'),
                        ]);
                    }
                }
            }
        }
		return view('admin-panel', compact('steamAppDetails'));
	}
}
