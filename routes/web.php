<?php

use App\Http\Livewire\Panel\Config\ConfigView;
use App\Http\Livewire\Panel\Enterprises\Detail\
{
    EnterpriseDetailList,
    EnterpriseDetailCreate,
    EnterpriseDetailEdit
};

use App\Http\Livewire\Panel\Enterprises\{
    EnterpriseCreate,
    EnterpriseEdit,
    EnterpriseList,
    EnterprisePhotos
};

use App\Http\Livewire\Panel\Institutional\{
    InstitutionalList,
    InstitutionalCreate,
    InstitutionalEdit
};

use App\Http\Livewire\Panel\Slider\{
    SliderCreate,
    SliderEdit,
    SliderList
};
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->prefix('panel')->group(function(){

    Route::get('/config', ConfigView::class)->name('panel.config');

    Route::prefix('slider')->group(function(){
        Route::get('/', SliderList::class)->name('panel.slider');
        Route::get('/create', SliderCreate::class)->name('panel.slider.create');
        Route::get('/edit/{id}', SliderEdit::class)->name('panel.slider.edit');
    });

    Route::prefix('institutional')->group(function(){
        Route::get('/', InstitutionalList::class)->name('panel.institutional');
        Route::get('/create', InstitutionalCreate::class)->name('panel.institutional.create');
        Route::get('/edit/{id}', InstitutionalEdit::class)->name('panel.institutional.edit');
    });
    
    Route::prefix('enterprises')->group(function(){
        Route::get('/', EnterpriseList::class)->name('panel.enterprise');
        Route::get('/create', EnterpriseCreate::class)->name('panel.enterprise.create');
        Route::get('/edit/{id}', EnterpriseEdit::class)->name('panel.enterprise.edit');

        Route::get('/imagens/{id}', EnterprisePhotos::class)->name('panel.enterprise.imagens');

        Route::prefix('details')->group(function(){
            Route::get('/{id_empreendimento}', EnterpriseDetailList::class)->name('panel.enterprise.details');
            Route::get('/{id_empreendimento}/create', EnterpriseDetailCreate::class)->name('panel.enterprise.details.create');
            Route::get('/{id_empreendimento}/edit/{id_detail}', EnterpriseDetailEdit::class)->name('panel.enterprise.details.edit');   
        });
    });
    
});