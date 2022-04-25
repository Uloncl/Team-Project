<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function panel()
    {
        return view('admin-panel');
    }

    public function update()
    {
        dd();
        set_time_limit(10000000);
        $steamApps = json_decode(Http::get('https://api.steampowered.com/ISteamApps/GetAppList/v2/?access_token=c54705e41cc1c3bde731e3659aa55b67'))->applist->apps;
        $gamesinTable = DB::table('games')->get('steam_id');
        $existingApps = [];
        foreach ($gamesinTable as $game) {
            $existingApps[] = $game->steam_id;
        }
        $newApps = [];
        foreach ($steamApps as $app) {
            if (!in_array($app->appid, $existingApps)) {
                $newApps[] = $app->appid;
            }
        }
        sort($newApps);
        Log::info($newApps);
        $steamAppDetails = [];

        foreach ($newApps as $appid) 
        {
            $appDetails = json_decode(Http::get('https://store.steampowered.com/api/appdetails/', [
                'appids' => $appid,
                'l' => 'english',
                'cc' => 'EE'
            ]), true);
            if ($appDetails != null) 
            {
                $appDetails = $appDetails[$appid];
                if ($appDetails['success'] == true) 
                {
                    $appDetails = $appDetails['data'];
                    if ($appDetails['recommendations'] > 200) 
                    {
                        $gameDBID = DB::table('games')
                            ->insertGetId([
                                'steam_id' => $appid,
                                'type' => $appDetails['type'],
                                'title' => $appDetails['name'],
                                'description' => $appDetails['detailed_description'],
                                'about' => $appDetails['about_the_game'],
                                'languages' =>  isset($appDetails['supported_languages']) ? $appDetails['supported_languages'] : NULL,
                                'release_date' =>  isset($appDetails['release_date']) ? $appDetails['release_date']['date'] : NULL,
                                'steam_url' =>  'https://store.steampowered.com/app/' . $appDetails['steam_appid'],
                                'metacritic' =>  isset($appDetails['metacritic'], $appDetails['metacritic']['score']) ? $appDetails['metacritic']['score'] : NULL,
                                'metacritic_url' =>  isset($appDetails['metacritic'], $appDetails['metacritic']['url']) ? $appDetails['metacritic']['url'] : NULL,
                                'recommendations' =>  isset($appDetails['recommendations'], $appDetails['recommendations']['total']) ? $appDetails['recommendations']['total'] : NULL,
                                'is_free' => $appDetails['is_free'],
                                'current_steam_price' => $appDetails['price_overview']['final'],
                                'best_price' => $appDetails['price_overview']['final'],
                                'best_store' => 'steam',
                                'windows' => isset($appDetails['platforms']['windows']) ? $appDetails['platforms']['windows'] : NULL,
                                'pc_recommended' => isset($appDetails['pc_requirements']['recommended']) ? $appDetails['pc_requirements']['recommended'] : NULL,
                                'pc_minimum' => isset($appDetails['pc_requirements']['minimum']) ? $appDetails['pc_requirements']['minimum'] : NULL,
                                'linux' => isset($appDetails['platforms']['linux']) ? $appDetails['platforms']['linux'] : NULL,
                                'linux_recommended' => isset($appDetails['linux_requirements']['recommended']) ? $appDetails['linux_requirements']['recommended'] : NULL,
                                'linux_minimum' => isset($appDetails['linux_requirements']['minimum']) ? $appDetails['linux_requirements']['minimum'] : NULL,
                                'mac' => isset($appDetails['platforms']['mac']) ? $appDetails['platforms']['mac'] : NULL,
                                'mac_recommended' => isset($appDetails['mac_requirements']['recommended']) ? $appDetails['mac_requirements']['recommended'] : NULL,
                                'mac_minimum' => isset($appDetails['mac_requirements']['minimum']) ? $appDetails['mac_requirements']['minimum'] : NULL,
                            ]);
                        if (isset($appDetails['package_groups'])) 
                        {
                            foreach ($appDetails['package_groups']['subs'] as $sub) {
                                DB::table('packages')->insert([
                                    'game_id' => $gameDBID,
                                    'steam_package_id' => $sub['packageid'],
                                    'option_text' => $sub['option_text'],
                                    'option_description' => $sub['option_description'],
                                    'is_free' => $sub['is_free_licence'],
                                    'price' => $sub['price_in_cents_with_discount'],
                                ]);
                            }
                        }
                        if (isset($appDetails['categories'])) 
                        {
                            foreach ($appDetails['categories'] as $category) {
                                DB::table('game_tags_mappings')->insert([
                                    'game_id' => $gameDBID,
                                    'tag_id' => DB::table('game_tags_definitions')->insertGetId([
                                        'name' => $category,
                                        'type' => 'category'
                                    ])
                                ]);
                            }
                        }
                        if (isset($appDetails['genres'])) 
                        {
                            foreach ($appDetails['genres'] as $genre) {
                                DB::table('game_tags_mappings')->insert([
                                    'game_id' => $gameDBID,
                                    'tag_id' => DB::table('game_tags_definitions')->insertGetId([
                                        'name' => $genre,
                                        'type' => 'genre'
                                    ])
                                ]);
                            }
                        }
                        if (isset($appDetails['developers'])) 
                        {
                            foreach ($appDetails['developers'] as $developer) {
                                DB::table('game_credits_mappings')->insert([
                                    'game_id' => $gameDBID,
                                    'credit_id' => DB::table('game_credits_definitions')->insertGetId([
                                        'name' => $developer,
                                        'type' => 'developer'
                                    ])
                                ]);
                            }
                        }
                        if (isset($appDetails['publishers'])) 
                        {
                            foreach ($appDetails['publishers'] as $publisher) {
                                DB::table('game_credits_mappings')->insert([
                                    'game_id' => $gameDBID,
                                    'credit_id' => DB::table('game_credits_definitions')->insertGetId([
                                        'name' => $publisher,
                                        'type' => 'publisher'
                                    ])
                                ]);
                            }
                        }
                        if (isset($appDetails['screenshots'])) 
                        {
                            foreach ($appDetails['screenshots'] as $image) {
                                DB::table('game_images')->insert([
                                    'thumbnail' => $image['path_thumbnail'],
                                    'full' => $image['path_full'],
                                    'game_id' => $gameDBID,
                                ]);
                            }
                        }
                        if (isset($appDetails['movies'])) 
                        {
                            foreach ($appDetails['movies'] as $video) {
                                DB::table('game_videos')->insert([
                                    'name' => $video['name'],
                                    'thumbnail' => $video['path_thumbnail'],
                                    'video_480p' => $video['mp4']['480'],
                                    'video_max' => $video['mp4']['max'],
                                    'game_id' => $gameDBID,
                                ]);
                            }
                        }
                        if (isset($appDetails['dlc'])) 
                        {
                            foreach ($appDetails['dlc'] as $dlcid) 
                            {
                                $dlcDetails = json_decode(Http::get('https://store.steampowered.com/api/appdetails/', [
                                    'appids' => $dlcid,
                                    'l' => 'english',
                                    'cc' => 'EE'
                                ]), true);
                                if ($dlcDetails != null) 
                                {
                                    $dlcDetails = $dlcDetails[$dlcid];
                                    if ($dlcDetails['success'] == true) 
                                    {
                                        $dlcDetails = $dlcDetails['data'];
                                        $dlcDBID = DB::table('games')
                                            ->insertGetId([
                                                'steam_id' => $dlcid,
                                                'type' => $dlcDetails['type'],
                                                'title' => $dlcDetails['name'],
                                                'description' => $dlcDetails['detailed_description'],
                                                'about' => $dlcDetails['about_the_game'],
                                                'languages' =>  isset($dlcDetails['supported_languages']) ? $dlcDetails['supported_languages'] : NULL,
                                                'steam_url' =>  'https://store.steampowered.com/app/' . $dlcDetails['steam_appid'],
                                                'metacritic' =>  isset($dlcDetails['metacritic'], $dlcDetails['metacritic']['score']) ? $dlcDetails['metacritic']['score'] : NULL,
                                                'metacritic_url' =>  isset($dlcDetails['metacritic'], $dlcDetails['metacritic']['url']) ? $dlcDetails['metacritic']['url'] : NULL,
                                                'recommendations' =>  isset($dlcDetails['recommendations'], $dlcDetails['recommendations']['total']) ? $dlcDetails['recommendations']['total'] : NULL,
                                                'is_free' => $dlcDetails['is_free'],
                                                'current_steam_price' => $dlcDetails['price_overview']['final'],
                                                'best_price' => $dlcDetails['price_overview']['final'],
                                                'best_store' => 'steam',
                                                'windows' => isset($dlcDetails['platforms']['windows']) ? $dlcDetails['platforms']['windows'] : NULL,
                                                'pc_recommended' => isset($dlcDetails['pc_requirements']['recommended']) ? $dlcDetails['pc_requirements']['recommended'] : NULL,
                                                'pc_minimum' => isset($dlcDetails['pc_requirements']['minimum']) ? $dlcDetails['pc_requirements']['minimum'] : NULL,
                                                'linux' => isset($dlcDetails['platforms']['linux']) ? $dlcDetails['platforms']['linux'] : NULL,
                                                'linux_recommended' => isset($dlcDetails['linux_requirements']['recommended']) ? $dlcDetails['linux_requirements']['recommended'] : NULL,
                                                'linux_minimum' => isset($dlcDetails['linux_requirements']['minimum']) ? $dlcDetails['linux_requirements']['minimum'] : NULL,
                                                'mac' => isset($dlcDetails['platforms']['mac']) ? $dlcDetails['platforms']['mac'] : NULL,
                                                'mac_recommended' => isset($dlcDetails['mac_requirements']['recommended']) ? $dlcDetails['mac_requirements']['recommended'] : NULL,
                                                'mac_minimum' => isset($dlcDetails['mac_requirements']['minimum']) ? $dlcDetails['mac_requirements']['minimum'] : NULL,
                                            ]);
                                        
                                        if (isset($dlcDetails['package_groups'])) 
                                        {
                                            foreach ($dlcDetails['package_groups']['subs'] as $sub) {
                                                DB::table('packages')->insert([
                                                    'game_id' => $dlcDBID,
                                                    'steam_package_id' => $sub['packageid'],
                                                    'option_text' => $sub['option_text'],
                                                    'option_description' => $sub['option_description'],
                                                    'is_free' => $sub['is_free_licence'],
                                                    'price' => $sub['price_in_cents_with_discount'],
                                                ]);
                                            }
                                        }
                                        if (isset($dlcDetails['categories'])) 
                                        {
                                            foreach ($dlcDetails['categories'] as $category) {
                                                DB::table('game_tags_mappings')->insert([
                                                    'game_id' => $dlcDBID,
                                                    'tag_id' => DB::table('game_tags_definitions')->insertGetId([
                                                        'name' => $category,
                                                        'type' => 'category'
                                                    ])
                                                ]);
                                            }
                                        }
                                        if (isset($dlcDetails['genres'])) 
                                        {
                                            foreach ($dlcDetails['genres'] as $genre) {
                                                DB::table('game_tags_mappings')->insert([
                                                    'game_id' => $dlcDBID,
                                                    'tag_id' => DB::table('game_tags_definitions')->insertGetId([
                                                        'name' => $genre,
                                                        'type' => 'genre'
                                                    ])
                                                ]);
                                            }
                                        }
                                        if (isset($dlcDetails['developers'])) 
                                        {
                                            foreach ($dlcDetails['developers'] as $developer) {
                                                DB::table('game_credits_mappings')->insert([
                                                    'game_id' => $dlcDBID,
                                                    'credit_id' => DB::table('game_credits_definitions')->insertGetId([
                                                        'name' => $developer,
                                                        'type' => 'developer'
                                                    ])
                                                ]);
                                            }
                                        }
                                        if (isset($dlcDetails['publishers'])) 
                                        {
                                            foreach ($dlcDetails['publishers'] as $publisher) {
                                                DB::table('game_credits_mappings')->insert([
                                                    'game_id' => $dlcDBID,
                                                    'credit_id' => DB::table('game_credits_definitions')->insertGetId([
                                                        'name' => $publisher,
                                                        'type' => 'publisher'
                                                    ])
                                                ]);
                                            }
                                        }
                                        if (isset($dlcDetails['screenshots'])) 
                                        {
                                            foreach ($dlcDetails['screenshots'] as $image) {
                                                DB::table('game_images')->insert([
                                                    'thumbnail' => $image['path_thumbnail'],
                                                    'full' => $image['path_full'],
                                                    'game_id' => $dlcDBID,
                                                ]);
                                            }
                                        }
                                        if (isset($dlcDetails['movies'])) 
                                        {
                                            foreach ($dlcDetails['movies'] as $video) {
                                                DB::table('game_videos')->insert([
                                                    'name' => $video['name'],
                                                    'thumbnail' => $video['path_thumbnail'],
                                                    'video_480p' => $video['mp4']['480'],
                                                    'video_max' => $video['mp4']['max'],
                                                    'game_id' => $dlcDBID,
                                                ]);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } else 
                    {
                        DB::table('games')->insert([
                            'steam_id' => $appid,
                            'banned' => true
                        ]);
                    }
                }
            }
        }
        return view('admin-panel');
    }
}
