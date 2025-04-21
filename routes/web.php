<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\MasterSettingController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;







Route::get('/', function () {
    return redirect('/login');
});


// Authentication Routes
Auth::routes();

// Override Laravel Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect('/login');
});


// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/add', [CategoryController::class, 'add'])->name('categories.add');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('/subcategories', [SubcategoryController::class, 'index'])->name('subcategories.index');
    Route::get('/subcategory/add', [SubcategoryController::class, 'create'])->name('subcategories.create');
    Route::post('/subcategory/store', [SubcategoryController::class, 'store'])->name('subcategories.store');
    Route::get('/subcategory/edit/{id}', [SubcategoryController::class, 'edit'])->name('subcategories.edit');
    Route::put('/subcategory/update/{id}', [SubcategoryController::class, 'update'])->name('subcategories.update');
    Route::delete('/subcategory/{id}', [SubcategoryController::class, 'destroy'])->name('subcategories.destroy');

    Route::get('/products/index', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/add', [ProductController::class, 'add'])->name('product.add');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
    Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchases.index');
    Route::get('/purchases/add', [PurchaseController::class, 'create'])->name('purchases.create');
    Route::post('/purchases/store', [PurchaseController::class, 'store'])->name('purchases.store');
    Route::get('/billing/{order_id}', [BillingController::class, 'index'])->name('billing.index');
    Route::get('/billing/combined/{orderIds}', [BillingController::class, 'combinedBilling'])->name('billing.combined');

    Route::post('/billing/update-status/{orderIds}', [BillingController::class, 'updateStatus']);



    Route::get('/billing/get-product', [BillingController::class, 'getProductByBarcode'])->name('billing.getProductByBarcode');




    Route::post('purchases/store-party', [PurchaseController::class, 'storeParty'])->name('purchases.storeParty');
    Route::resource('bills', BillingController::class);


    Route::get('/bills', [BillController::class, 'index'])->name('bills.index');
    Route::get('/bills/{bill}', [BillController::class, 'show'])->name('bills.show');
    Route::get('/ord_list', [BillController::class, 'order_list'])->name('bills.order_list');
    Route::post('/orders/{id}/update-status', 'BillController@updateStatus')->name('orders.updateStatus');



    // add customer
    Route::post('/add-customer', [CustomerController::class, 'Customer_store'])->name('add.customer');
    Route::get('/search-customers', [CustomerController::class, 'searchCustomers'])->name('search.customers');
    ///////
    Route::get('/get-product-by-barcode', [BillingController::class, 'getProductByBarcode'])->name('get.product.by.barcode');
    Route::get('/get-products-by-barcodes', [BillingController::class, 'getProductsByBarcodes'])->name('get.products.by.barcodes');


    Route::get('/get-subcategories', [ProductController::class, 'getSubcategories'])->name('get.subcategories');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('billing', [BillingController::class, 'billings'])->name('billing');
    Route::get('billing_list', [BillingController::class, 'Billinglist'])->name('billing.list');
    Route::get('/billing-subcategories', [BillingController::class, 'billingSubcategories'])->name('billing.subcategories');
    Route::post('/takeaway', [BillingController::class, 'store'])->name('takeaway.store');
    // Route::get('/admin/takeaway/receipt/{id}', [BillingController::class, 'getTakeawayReceipt'])->name('takeaway.receipt');
    Route::get('/admin/takeaway/receipt/{id}', [BillingController::class, 'getTakeawayReceipt'])->name('takeaway.receipt');
    // Route::get('/admin/takeaway/subtotal/{id}', [BillingController::class, 'getTakeawaySubtotal']);
    Route::get('/get-takeaway-subtotal/{id}', [BillingController::class, 'getTakeawaySubtotal']);
    Route::get('/get-takeaway-receipt/{id}', [BillingController::class, 'getTakeawayReceipt']);
    Route::post('/takeaway/mark-printed/{id}', [BillingController::class, 'markTakeawayAsPrinted']);

    // web.php
    Route::get('/takeaway_billing', [BillingController::class, 'Take_away'])->name('bills.take_away');
    Route::get('/reports', [BillingController::class, 'Bill_Reports'])->name('bills.reports');
    Route::get('/bill-reports', [BillingController::class, 'Bill_Reports'])->name('bill.reports');
    Route::get('/purchases/{id}', [PurchaseController::class, 'show'])->name('purchases.show');



    Route::post('/store-bill', [BillingController::class, 'storeBill'])->name('store.bill');
    Route::get('/users/{id}/permissions', [UserController::class, 'showPermissions'])->name('users.permissions');
    Route::put('/users/{id}/permissions', [UserController::class, 'updatePermissions'])->name('update.permissions');

    Route::get('/manage-users', [UserController::class, 'index'])->name('manage.users');
    Route::post('/create-user', [UserController::class, 'createUserUnderAdmin'])->name('create.user');
});

Route::middleware(['auth', 'role:Waiter,User,Cashier'])->group(function () {

    Route::get('user_dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});

Route::middleware(['auth', 'role:Waiter'])->group(function () {
    Route::get('/waiter/orders', 'WaiterController@index')->name('waiter.orders.index');
    Route::post('/waiter/orders/store', 'WaiterController@storeTemporaryOrder')->name('waiter.orders.store');
    Route::get('/waiter/orders/summary', 'WaiterController@showOrderSummary')->name('waiter.orders.summary');
    Route::post('/waiter/orders/confirm', 'WaiterController@confirmOrder')->name('waiter.orders.confirm');
    Route::post('/orders', 'WaiterController@store')->name('orders.store');
});


Route::get('/order', 'OrderController@takeOrder')->middleware('permission:Take Order');

Route::middleware(['auth', 'permission:create_bill'])->group(function () {
    Route::get('bill_confirm', [BillingController::class, 'index'])->name('bill_confirm');
    Route::post('/store-bill', [BillingController::class, 'storeBill'])->name('store.bill');
});



// Super Admin Routes
Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('superadmin_dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');
    Route::get('users', [SuperAdminController::class, 'users'])->name('superadmin.users');
    Route::get('users_create', [SuperAdminController::class, 'createUser'])->name('users.create');
    Route::post('users_store', [SuperAdminController::class, 'storeUser'])->name('users.store');
    Route::get('/master-settings', [MasterSettingController::class, 'index'])->name('master-settings.index');
    Route::post('/master-settings', [MasterSettingController::class, 'update'])->name('master-settings.update');
    Route::post('/users/{id}/extend-trial', [SuperAdminController::class, 'extendTrial'])->name('users.extend-trial');
    Route::post('/users/{id}/block', [SuperAdminController::class, 'blockUser'])->name('users.block');
    Route::post('/users/{id}/unblock', [SuperAdminController::class, 'unblockUser'])->name('users.unblock');
});
Route::get('billing_page', function () {
    return view('billing_page');
});
Route::get('page-list-category', function () {
    return view('admin/page_list_category');
});
Route::get('page-add-category', function () {
    return view('admin/page_add_category');
});



Route::get('home', [WebsiteController::class, 'index'])->name('website.home');
Route::get('menu', [WebsiteController::class, 'menu'])->name('website.menu');
Route::get('gallery', [WebsiteController::class, 'gallery'])->name('website.gallery');
Route::get('contact', [WebsiteController::class, 'contact'])->name('website.contact');
Route::get('about', [WebsiteController::class, 'about'])->name('website.about');
