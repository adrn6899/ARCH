<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', function (){
    $response = Http::get("http://export.arxiv.org/api/query?search_query=all:python");
    $xml = new SimpleXMLElement($response->body());
    $info = [];
    foreach ($xml->entry as $item) {
        $authors = [];
        foreach ($item->author as $author) {
            $authors[] = (string) $author->name;
        }
        $links = [];
        foreach ($item->link as $link) {
            $links[] = [
                'href' => (string) $link['href'],
                'type' => (string) $link['type'],
            ];
        }
        $info[] = [
            'title' => (string) $item->title,
            'summary' => (string) $item->summary,
            'published' => (string) $item->published,
            'updated' => (string) $item->updated,
            'authors' => $authors,
            'links' => $links,
        ];
    }
    // return response()->json($info);
    return view()->make('test')->with(['info' => $info]);
});
