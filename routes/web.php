<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use Syntax\SteamApi\Steam\News;
use Syntax\SteamApi\Steam\App;
use \Syntax\SteamApi\Steam\Player;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/news', function (Request $request) {
  $news = new News();
//  print_r($news->GetNewsForApp(261550, 5)->newsitems);
//  array_search ( mixed $needle , array $haystack [, bool $strict = FALSE ] )
  return view('index', [
    'news' => $news->GetNewsForApp(261550, 15)->newsitems,
//    'apps_array' => $apps_array,
  ]);
});

Route::any('/', function (Request $request) {
  $appName = $request->name;
  $news = new News();
  $app_object = new App();
  $apps_array = $app_object->GetAppList();
  $app_object = new App();
  if ($appName) {
    $app_id = $apps_array[array_search($appName, array_column($apps_array, 'name'))]->appid;
    $app_details = $app_object->appDetails($app_id, 'us');
    return view('index', [
      'app_details' => $app_details,
      'news' => $news->GetNewsForApp($app_id, 15)->newsitems,
    ]);
  }
  else {
    return view('index', [
    ]);
  }
});

Route::any('/get-player', function (Request $request) {
  $player_name_or_id = $request->name;
  $player = new Player();
});
