<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BOMController;
use App\Http\Controllers\BriefController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BOMSupplierController;
use App\Http\Controllers\BomSupplierItemController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will be
| assigned to the "web" middleware group.
|
*/

// Public route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route using the DashboardController; applying auth and verified middleware.
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Additional static view routes
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    Route::get('/404', function () {
        return view('404');
    })->name('404');
    Route::get('/alerts', function () {
        return view('alerts');
    })->name('alerts');
    Route::get('/blank', function () {
        return view('blank');
    })->name('blank');
    Route::get('/calendar', function () {
        return view('calendar');
    })->name('calendar');
    Route::get('/form-elements', function () {
        return view('form-elements');
    })->name('form-elements');
    Route::get('/basic-tables', function () {
        return view('basic-tables');
    })->name('basic-tables');
    Route::get('/avatars', function () {
        return view('avatars');
    })->name('avatars');
    Route::get('/badge', function () {
        return view('badge');
    })->name('badge');
    Route::get('/buttons', function () {
        return view('buttons');
    })->name('buttons');
    Route::get('/images', function () {
        return view('images');
    })->name('images');
    Route::get('/videos', function () {
        return view('videos');
    })->name('videos');
    Route::get('/signin', function () {
        return view('signin');
    })->name('signin');
    Route::get('/signup', function () {
        return view('signup');
    })->name('signup');
    Route::get('/image', function () {
        return view('image');
    });
    Route::get('/line-chart', function () {
        return view('line-chart');
    })->name('line-chart');
    Route::get('/bar-chart', function () {
        return view('bar-chart');
    })->name('bar-chart');
    Route::get('/dash', function () {
        return view('dash');
    })->name('dash');

    // Routes for Clients
    Route::resource('clients', ClientController::class);
    Route::controller(ClientController::class)
        ->prefix('clients')
        ->name('client.')
        ->group(function(){
            Route::get('/{client}', 'show')->name('show');
        });

    // Custom clients route for totalBriefs
    Route::get('/clients', [ClientController::class, 'totalBriefs'])->name('clients.index');
    Route::get('/allclients', [ClientController::class, 'allTotalBriefs'])->name('clients.all');


    // Routes for Briefs
    Route::resource('briefs', BriefController::class);
    Route::controller(BriefController::class)
        ->prefix('brief')
        ->name('brief.')
        ->group(function(){
            Route::get('/{brief}', 'show')->name('show');
            Route::get('/{brief_id}/items','items')->name('items');
        });
    // Nested brief routes under clients
    Route::prefix('clients/{client}')->group(function () {
        Route::get('/briefs/{brief_id}', [BriefController::class, 'showItems'])->name('client.brief.show');
        Route::get('/briefs/{brief_id}/edit', [BriefController::class, 'edit'])->name('client.brief.edit');
    });
    // Route::get('/briefs/{brief_id}', [BriefController::class, 'showItems'])->name('briefs.show');
    Route::post('briefs/{brief_id}/items', [BriefController::class, 'storeItem'])->name('briefs.items.store');
    Route::get('/briefs/{brief_id}', [BriefController::class, 'show'])->name('briefs.brief');
    Route::get('/allBriefs', [BriefController::class, 'allBriefs'])->name('briefs.all');
    Route::get('/briefs/{brief_id}/edit', [BriefController::class, 'edit'])->name('client.brief.edit');

    // Routes for Items
    Route::resource('items', ItemController::class);
    Route::get('/items', [ItemController::class, 'items'])->name('items.items');
    Route::get('/items/{item}', [ItemController::class, 'itemShow'])->name('items.item');
    Route::get('/items/index', [ItemController::class, 'index'])->name('items.index');


    // Listing items for a specific brief under a specific client
    Route::get('clients/{client_id}/briefs/{brief_id}/items', [ItemController::class, 'index'])->name('clients.briefs.items');
    // Show specific item route (duplicated names might need adjustment)
    Route::get('clients/{client_id}/briefs/{brief_id}/items/{item_id}', [ItemController::class, 'show'])->name('clients.briefs.items');
    Route::get('clients/{client_id}/briefs/{brief_id}/items/{item_id}', [ItemController::class, 'show'])->name('items.show');
    
    // New route for adding items (clients journey)
    Route::post('clients/{client}/briefs/{brief}/items', [BriefController::class, 'storeItem'])->name('clients.briefs.items.store');

    // Routes for BOM
    Route::get('clients/{client_id}/briefs/{brief_id}/items/{item_id}/bom', [BOMController::class, 'create'])->name('bom.create');
    Route::resource('bom', BOMController::class);

    // Routes for Suppliers
    Route::resource('suppliers', SupplierController::class);
    Route::get('suppliers/{id}', [SupplierController::class, 'show'])->name('suppliers.show');

    // BOMSupplier routes
    Route::resource('suppliers.bom_suppliers', BOMSupplierController::class)->only(['create', 'store', 'destroy']);
    Route::get('suppliers/{supplier}/boms/create', [BOMSupplierController::class, 'create'])->name('bom_suppliers.create');
    Route::post('suppliers/{supplier}/boms', [BOMSupplierController::class, 'store'])->name('bom_suppliers.store');
    Route::delete('suppliers/{supplier}/boms/{bom}', [BOMSupplierController::class, 'destroy'])->name('bom_suppliers.destroy');
    Route::get('/boms/{bom}/suppliers', [BomSupplierController::class, 'index'])->name('bom_suppliers.index');

    
    // BOMSupplierItems Routes
    Route::prefix('clients/{client_id}/briefs/{brief_id}/items/{item_id}/bom_supplier_items')
        ->as('bom_supplier_items.')
        ->group(function () {
            Route::get('/create', [BomSupplierItemController::class, 'create'])->name('create');
            Route::post('/', [BomSupplierItemController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [BomSupplierItemController::class, 'edit'])->name('edit');
            Route::put('/{id}', [BomSupplierItemController::class, 'update'])->name('update');
            Route::delete('/{id}', [BomSupplierItemController::class, 'destroy'])->name('destroy');
            Route::get('/add', [BomSupplierItemController::class, 'addSupplier'])->name('add');
        });
    Route::get('/items/{item_id}/addSupplier', [BomSupplierItemController::class, 'addSupplier'])->name('bom_supplier_items.add');


    // Routes for editing and updating BOM assignments
    Route::get('suppliers/{supplier}/boms/{bom}/edit', [BOMSupplierController::class, 'edit'])->name('bom_suppliers.edit');
    Route::put('suppliers/{supplier}/boms/{bom}', [BOMSupplierController::class, 'update'])->name('bom_suppliers.update');
    Route::get('/suppliers/bom', [BomSupplierController::class, 'index'])->name('suppliers.bom');

    // Routes for Reports
    Route::resource('reports', ReportController::class);
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
});

// Logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
