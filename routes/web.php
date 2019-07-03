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
use Syntax\SteamApi\Client;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/news', function (Request $request) {
  $news = new News();
//  print_r($news->GetNewsForApp(261550, 5)->newsitems);
//  array_search ( mixed $needle , array $haystack [, bool $strict = FALSE ] )
  return view('index', [
    'news' => $news->GetNewsForApp(261550, 15)->newsitems,
//    'apps_array' => $apps_array,
  ]);
});

Route::get('/app-news', function (Request $request) {
  $client = new Client();
  print_r($client);
  $news = new News();
  $app_object = new App();
  $apps_array = $app_object->GetAppList();
  print_r($app_object->appDetails(261550));
  print_r($apps_array[array_search('test3', array_column($apps_array, 'name'))]);
  return view('index', [
    'news' => $news->GetNewsForApp(261550, 15)->newsitems,
    'apps_array' => $apps_array,
  ]);
});
