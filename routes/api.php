<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

// Route::get('/endpoint', function (Request $request) {
//     //
// });

function make_urls_into_links($plain_text)
{
    return preg_replace(
        '@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-~]*(\?\S+)?)?)?)@',
        '<a href="$1" target="_blank">$1</a>',
        $plain_text
    );
}

Route::post('/open', function (Request $request) {
    \Artisan::call('translation_sheet:open');

    return [
        'message' => make_urls_into_links(\Artisan::output())
    ];
});


Route::post('/pull', function (Request $request) {

    try {
        \Artisan::call('translation_sheet:pull');
        //\Artisan::call('VueTranslation:generate --watch=1');

        return [
            'message' =>  'Las traducciones fueron procesadas'
        ];
    } catch (\Throwable $th) {
        return [
            'message' => 'Error en procesar las traducciones'
        ];
    }

});