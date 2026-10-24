<?php

use App\Http\Controllers\ChiSiamoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TrovaLaFormaController;
use App\Http\Controllers\ShowStaffController;
use App\Http\Controllers\HomeController;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Hall;
use App\Models\Payment_method;
use App\Models\Service;
use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\Receipt;
use App\Models\Product;
use App\Models\Review;
use App\Models\Appointment;
use App\Models\Phone;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController; //Aggiunto questo use

//Rotte Pagina Vetrina

// Rotta Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rotta Trova la forma
Route::get('/trova_la_forma', [TrovaLaFormaController::class, 'index'])->name('trova_la_forma');

// Rotta Show Staff
Route::get('/show_staff', [ShowStaffController::class, 'index'])->name('show_staff');

//Rotta Contatti
Route::get('/contatti', [ContactController::class, 'index'])->name('contatti.form');
Route::post('/contatti', [ContactController::class, 'send'])->name('contatti.send');

//Rotta chi siamo
Route::get('/chi-siamo', [ChiSiamoController::class, 'index'])->name('chi-siamo');


//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// Rotte Dashboard per Employee
Route::middleware('auth:employee')->group(function () {
    //Rotta  Employee/Dashboard/Home
    Route::get('/employee/dashboard/home', [EmployeeController::class, 'home'])->name('home2.index');

    // Rotte per gli Appuntamenti
    Route::get('/employee/dashboard/appointments', [EmployeeController::class, 'appointmentList'])->name('appointmentList.index2');
    Route::get('/employee/dashboard/appointments/create', [EmployeeController::class, 'createAppointment'])->name('appointments.create2');
    Route::post('/employee/dashboard/appointments', [EmployeeController::class, 'storeAppointment'])->name('appointments.store2');
    Route::get('/employee/dashboard/appointments/{id}/edit', [EmployeeController::class, 'editAppointment'])->name('appointments.edit2');
    Route::put('/employee/dashboard/appointments/{id}', [EmployeeController::class, 'updateAppointment'])->name('appointments.update2');
    Route::delete('/employee/dashboard/appointments/{id}', [EmployeeController::class, 'destroyAppointment'])->name('appointments.destroy2');

    // Rotte per i Prodotti
    Route::get('/employee/dashboard/products', [EmployeeController::class, 'productList'])->name('productList.index2');
    Route::get('/employee/dashboard/products/create', [EmployeeController::class, 'createProduct'])->name('products.create2');
    Route::post('/employee/dashboard/products', [EmployeeController::class, 'storeProduct'])->name('products.store2');
    Route::get('/employee/dashboard/products/{id}/edit', [EmployeeController::class, 'editProduct'])->name('products.edit2');
    Route::put('/employee/dashboard/products/{id}', [EmployeeController::class, 'updateProduct'])->name('products.update2');
    Route::delete('/employee/dashboard/products/{id}', [EmployeeController::class, 'destroyProduct'])->name('products.destroy2');

    // Rotte per le Recensioni
    Route::get('/employee/dashboard/reviews', [EmployeeController::class, 'reviewList'])->name('reviewList.index2');
    Route::get('/employee/dashboard/reviews/create', [EmployeeController::class, 'createReview'])->name('reviews.create2');
    Route::post('/employee/dashboard/reviews', [EmployeeController::class, 'storeReview'])->name('reviews.store2');
    Route::get('/employee/dashboard/reviews/{id}/edit', [EmployeeController::class, 'editReview'])->name('reviews.edit2');
    Route::put('/employee/dashboard/reviews/{id}', [EmployeeController::class, 'updateReview'])->name('reviews.update2');
    Route::delete('/employee/dashboard/reviews/{id}', [EmployeeController::class, 'destroyReview'])->name('reviews.destroy2');

     //Rotta  Owner/Dashboard/Customers
     Route::get('/employee/dashboard/customers', [EmployeeController::class, 'customerList'])->name('customerList.index2');
     Route::get('/employee/dashboard/customers/create', [EmployeeController::class, 'createCustomer'])->name('customers.create2');
     Route::post('/employee/dashboard/customers', [EmployeeController::class, 'storeCustomer'])->name('customers.store2');
     Route::get('/employee/dashboard/customers/{id}/edit', [EmployeeController::class, 'editCustomer'])->name('customers.edit2');
     Route::put('/employee/dashboard/customers/{id}', [EmployeeController::class, 'updateCustomer'])->name('customers.update2');
     Route::delete('/employee/dashboard/customers/{id}', [EmployeeController::class, 'destroyCustomer'])->name('customers.destroy2');


    //Rotta Logout
     Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });


//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// Rotta Dashboard per Owner
Route::middleware('auth:owner')->group(function () {
    //Rotta  Owner/Dashboard/Home
    Route::get('/owner/dashboard/home', [OwnerController::class, 'home'])->name('home.index');

    // Rotte per gli Appuntamenti
    Route::get('/owner/dashboard/appointments', [OwnerController::class, 'appointmentList'])->name('appointmentList.index');
    Route::get('/owner/dashboard/appointments/create', [OwnerController::class, 'createAppointment'])->name('appointments.create');
    Route::post('/owner/dashboard/appointments', [OwnerController::class, 'storeAppointment'])->name('appointments.store');
    Route::get('/owner/dashboard/appointments/{id}/edit', [OwnerController::class, 'editAppointment'])->name('appointments.edit');
    Route::put('/owner/dashboard/appointments/{id}', [OwnerController::class, 'updateAppointment'])->name('appointments.update');
    Route::delete('/owner/dashboard/appointments/{id}', [OwnerController::class, 'destroyAppointment'])->name('appointments.destroy');


    // Rotte per i Servizi
    Route::get('/owner/dashboard/services', [OwnerController::class, 'serviceList'])->name('serviceList.index');
    Route::get('/owner/dashboard/services/create', [OwnerController::class, 'createService'])->name('services.create');
    Route::post('/owner/dashboard/services', [OwnerController::class, 'storeService'])->name('services.store');
    Route::get('/owner/dashboard/services/{id}/edit', [OwnerController::class, 'editService'])->name('services.edit');
    Route::put('/owner/dashboard/services/{id}', [OwnerController::class, 'updateService'])->name('services.update');
    Route::delete('/owner/dashboard/services/{id}', [OwnerController::class, 'destroyService'])->name('services.destroy');


    // Rotte per i Prodotti
    Route::get('/owner/dashboard/products', [OwnerController::class, 'productList'])->name('productList.index');
    Route::get('/owner/dashboard/products/create', [OwnerController::class, 'createProduct'])->name('products.create');
    Route::post('/owner/dashboard/products', [OwnerController::class, 'storeProduct'])->name('products.store');
    Route::get('/owner/dashboard/products/{id}/edit', [OwnerController::class, 'editProduct'])->name('products.edit');
    Route::put('/owner/dashboard/products/{id}', [OwnerController::class, 'updateProduct'])->name('products.update');
    Route::delete('/owner/dashboard/products/{id}', [OwnerController::class, 'destroyProduct'])->name('products.destroy');


    // Rotte per le Recensioni
    Route::get('/owner/dashboard/reviews', [OwnerController::class, 'reviewList'])->name('reviewList.index');
    Route::get('/owner/dashboard/reviews/create', [OwnerController::class, 'createReview'])->name('reviews.create');
    Route::post('/owner/dashboard/reviews', [OwnerController::class, 'storeReview'])->name('reviews.store');
    Route::get('/owner/dashboard/reviews/{id}/edit', [OwnerController::class, 'editReview'])->name('reviews.edit');
    Route::put('/owner/dashboard/reviews/{id}', [OwnerController::class, 'updateReview'])->name('reviews.update');
    Route::delete('/owner/dashboard/reviews/{id}', [OwnerController::class, 'destroyReview'])->name('reviews.destroy');

    //Rotta  Owner/Dashboard/Employees
    Route::get('/owner/dashboard/employees', [OwnerController::class, 'employeeList'])->name('employeesList.index');
    Route::get('/owner/dashboard/employees/create', [OwnerController::class, 'create'])->name('employees.create');
    Route::get('/owner/dashboard/employees/{id}/edit', [OwnerController::class, 'edit'])->name('employees.edit');
    Route::delete('/owner/dashboard/employees/{id}', [OwnerController::class, 'destroy'])->name('employees.destroy');
    Route::post('/owner/dashboard/employees', [OwnerController::class, 'store'])->name('employees.store');
    Route::put('/owner/dashboard/employees/{id}', [OwnerController::class, 'update'])->name('employees.update');

    //Rotta  Owner/Dashboard/Customers
    Route::get('/owner/dashboard/customers', [OwnerController::class, 'customerList'])->name('customerList.index');
    Route::get('/owner/dashboard/customers/create', [OwnerController::class, 'createCustomer'])->name('customers.create');
    Route::post('/owner/dashboard/customers', [OwnerController::class, 'storeCustomer'])->name('customers.store');
    Route::get('/owner/dashboard/customers/{id}/edit', [OwnerController::class, 'editCustomer'])->name('customers.edit');
    Route::put('/owner/dashboard/customers/{id}', [OwnerController::class, 'updateCustomer'])->name('customers.update');
    Route::delete('/owner/dashboard/customers/{id}', [OwnerController::class, 'destroyCustomer'])->name('customers.destroy');

    //Rotta Owner/Dashboard/Receipts
    Route::get('/owner/dashboard/receipts', [OwnerController::class, 'receiptList'])->name('receiptList.index');
    Route::get('/owner/dashboard/receipts/create', [OwnerController::class, 'createReceipt'])->name('receipts.create');
    Route::post('/owner/dashboard/receipts', [OwnerController::class, 'storeReceipt'])->name('receipts.store');
    Route::get('/owner/dashboard/receipts/{id}/edit', [OwnerController::class, 'editReceipt'])->name('receipts.edit');
    Route::put('/owner/dashboard/receipts/{id}', [OwnerController::class, 'updateReceipt'])->name('receipts.update');
    Route::delete('/owner/dashboard/receipts/{id}', [OwnerController::class, 'destroyReceipt'])->name('receipts.destroy');
    Route::get('/owner/dashboard/receipts/{id}/edit', [OwnerController::class, 'editReceipt'])->name('receipts.edit');
    Route::put('/owner/dashboard/receipts/{id}', [OwnerController::class, 'updateReceipt'])->name('receipts.update');

    //Rotta  Owner/Dashboard/Suppliers
    Route::get('/owner/dashboard/suppliers', [OwnerController::class, 'supplierList'])->name('supplierList.index');
    Route::get('/owner/dashboard/suppliers/create', [OwnerController::class, 'createSupplier'])->name('suppliers.create');
    Route::post('/owner/dashboard/suppliers', [OwnerController::class, 'storeSupplier'])->name('suppliers.store');
    Route::get('/owner/dashboard/suppliers/{id}/edit', [OwnerController::class, 'editSupplier'])->name('suppliers.edit');
    Route::put('/owner/dashboard/suppliers/{id}', [OwnerController::class, 'updateSupplier'])->name('suppliers.update');
    Route::delete('/owner/dashboard/suppliers/{id}', [OwnerController::class, 'destroySupplier'])->name('suppliers.destroy');


    //Rotta Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
});

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Rotta di prova (per testing)
Route::get('/prova', function () {
    $customer = Customer::factory(2)->create();
    $employee = Employee::factory(2)->create();
    $owner = Warehouse::factory(2)->create();
    $category = Category::factory(2)->create();
    $supplier = Supplier::factory(2)->create();
    $service = Service::factory(2)->create();
    $payment_method = Payment_method::factory(2)->create();
    $hall = Hall::factory(2)->create();
    $receipt = Receipt::factory(2)->create();
    return [$customer, $employee, $owner, $category, $supplier, $service, $payment_method, $hall,$receipt];
});

// Rotte di autenticazione
require __DIR__ . '/auth.php';