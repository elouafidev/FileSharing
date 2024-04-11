<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel as PanelControllers;


Route::get('/',function (){return \Illuminate\Support\Facades\Redirect::route('panel.home');});

Route::group([
    'as' => 'panel.',
    'middleware' =>['auth','role:admin'],
],function(){
    Route::get('/home', [PanelControllers\HomeController::class, 'index'])->name('home');
    Route::get('/', function () {
        return Redirect::route('panel.folder.index');
    })->name('Panel');
    // Route for navigation folders and  object and destroy in PanelControl
    route::group(['prefix' => 'folder' ,'as' => 'folder.'],function (){
        Route::get('/', [PanelControllers\FolderController::class,'index'])->name('index');
        // Route for create Folder
        Route::get('{parent_id}/create', [PanelControllers\FolderController::class,'create'])->name('create');
        Route::post('{parent_id}/create', [PanelControllers\FolderController::class,'store']);
        // Route for create objects
                // Route for open Folder
        Route::get('/{id}', [PanelControllers\FolderController::class,'show'])->name('show');
        Route::delete('{id}', [PanelControllers\FolderController::class,'destroy']);
        // Route for edit Folder
        Route::get('{id}/edit', [PanelControllers\FolderController::class,'edit'])->name('edit');
        Route::put('{id}/edit', [PanelControllers\FolderController::class,'update']);

        route::group(['prefix' => 'sheet','as' => 'sheet.'],function (){
            Route::get('/create', 'ObjectController@create')->name('create');
            Route::post('/create', 'ObjectController@store');
            Route::delete('/{id}', 'ObjectController@destroy');
            Route::get('/{id}', 'ObjectController@edit')->name('edit');
            Route::put('/{id}', 'ObjectController@update');
        });

    });

});

Auth::routes();
