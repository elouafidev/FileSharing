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
        route::group(['prefix' => '{folder_id}/sheet','as' => 'sheet.'],function (){
            Route::get('create', [PanelControllers\SheetController::class,'create'])->name('create');
            Route::post('/create', [PanelControllers\SheetController::class,'store']);
            Route::delete('/{id}', [PanelControllers\SheetController::class,'destroy']);
            Route::get('/{id}', [PanelControllers\SheetController::class,'edit'])->name('edit');
            Route::put('/{id}', [PanelControllers\SheetController::class,'update']);
        });

    });
    route::group(['prefix' => 'contact','as' => 'contact.'],function (){
        Route::get('/', [PanelControllers\ContactController::class,'index'])->name('index');
        Route::delete('/{id}', [PanelControllers\ContactController::class,'destroy']);
        Route::get('/{id}', [PanelControllers\ContactController::class,'edit'])->name('edit');
        Route::put('/{id}', [PanelControllers\ContactController::class,'update']);
    });
});
route::group(['as' => 'panel.'],function (){
    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);
});
