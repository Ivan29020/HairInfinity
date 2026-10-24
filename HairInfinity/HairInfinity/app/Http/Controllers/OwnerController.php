<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Receipt;
use App\Models\Payment_method;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Category;
use App\Models\Service;
use App\Models\Review;
use App\Models\Hall;
use App\Models\Appointment;
use App\Models\Phone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OwnerController extends Controller
{
    // Funzione Home
    public function home()
    {
        $user = Auth::guard('owner')->user();

        if (!$user) {
            return redirect()->route('login')->withErrors([
                'error' => 'Accesso non autorizzato. Sei stato disconnesso.',
            ]);
        }

        $totalAppointments = Appointment::count();
        $totalEmployees = Employee::count();
        $totalProducts = Product::count();
        $totalReviews = Review::count();
        $totalSuppliers = Supplier::count();
        $totalReceipts = Receipt::count();
        $totalServices = Service::count();
        $totalCustomers = Customer::count();

        return view('Gestionale.owner.home', compact('totalAppointments', 'totalEmployees', 'totalProducts', 'totalReviews', 'totalSuppliers', 'totalReceipts', 'totalServices', 'totalCustomers'));
    }

    //Funzione appointmentList
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function appointmentList(Request $request)
    {
        $query = $request->input('query');
        $selectedDate = $request->input('date');
        $showAll = $request->input('show_all', false);

        // Se showAll è true, resetta la data selezionata
        if ($showAll) {
            $selectedDate = null;
        }


        $appointments = Appointment::with(['customer', 'employee', 'hall'])
            ->when(!$showAll && $selectedDate == null, function($queryBuilder){
                $queryBuilder->whereDate('date', today());
            })
            ->when($selectedDate, function ($queryBuilder) use ($selectedDate) {
                $queryBuilder->whereDate('date', $selectedDate);
            })
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('appointments.appointment_id', 'like', "%{$query}%")
                    ->orWhere('appointments.description', 'like', "%{$query}%")
                    ->orWhere('appointments.date', 'like', "%{$query}%")
                    ->orWhere('appointments.time', 'like', "%{$query}%")
                    ->orWhere('appointments.receipt_id', 'like', "%{$query}%")
                    ->orWhereHas('customer', function ($customerQuery) use ($query) {
                        $customerQuery->where('name', 'like', "%{$query}%")
                            ->orWhere('lastname', 'like', "%{$query}%");
                    })
                    ->orWhereHas('employee', function ($employeeQuery) use ($query) {
                        $employeeQuery->where('name', 'like', "%{$query}%")
                            ->orWhere('lastname', 'like', "%{$query}%");
                    })
                    ->orWhereHas('hall', function ($hallQuery) use ($query) {
                        $hallQuery->where('name', 'like', "%{$query}%");
                    });
            })
            ->paginate(10);

            $totalAppointments = Appointment::count();
            $totalReviews = Review::count();
            $totalReceipts = Receipt::count();

        return view('Gestionale.owner.appointmentList', compact('appointments', 'query', 'selectedDate', 'showAll','totalAppointments','totalReviews','totalReceipts'));
    }

    //Funzione createAppointment
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function createAppointment()
    {
        $customers = Customer::all();
        $employees = Employee::all();
        $halls = Hall::all();
        return view('Gestionale.owner.appointmentCreate', compact('customers', 'employees', 'halls'));
    }

    //Funzione storeAppointment
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function storeAppointment(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'description' => 'nullable|string|max:100',
            'customer_id' => 'required|exists:customers,customer_id',
            'employee_id' => 'required|exists:employees,employee_id',
            'hall_id' => 'required|exists:halls,hall_id',
            'total' => 'required|numeric|min:0', //Aggiunto il campo total per lo scontrino
            'payment_method_id' => 'required|exists:payment_methods,payment_method_id' //Aggiunto il campo payment_method_id per lo scontrino
        ]);

         //Creazione dello scontrino
         $receipt = Receipt::create([
                'issue_date' => now(), // Usa la data e ora corrente
                'total' => $request->total,
                'payment_method_id' => $request->payment_method_id
            ]);

        // Crea l'appuntamento associato al nuovo scontrino
        $appointment = Appointment::create($request->except(['total', 'payment_method_id']));
        $appointment->receipt_id = $receipt->receipt_id;
        $appointment->save();

        return redirect()->route('appointmentList.index')->with('success', 'Appuntamento aggiunto con successo!');
    }

     //Funzione editAppointment
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
     public function editAppointment($id)
    {
        $appointment = Appointment::where('appointment_id', $id)->firstOrFail();
          $customers = Customer::all();
          $employees = Employee::all();
          $halls = Hall::all();
         return view('Gestionale.owner.appointmentEdit', compact('appointment', 'customers', 'employees', 'halls'));
    }

    //Funzione updateAppointment
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function updateAppointment(Request $request, $id)
    {
          $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'description' => 'nullable|string|max:100',
            'customer_id' => 'required|exists:customers,customer_id',
            'employee_id' => 'required|exists:employees,employee_id',
            'hall_id' => 'required|exists:halls,hall_id',
          ]);

        $appointment = Appointment::where('appointment_id', $id)->firstOrFail();
        $appointment->update($request->all());

        return redirect()->route('appointmentList.index')->with('success', 'Appuntamento aggiornato con successo!');
    }

    //Funzione destroyAppointment
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function destroyAppointment($id)
    {
        $appointment = Appointment::where('appointment_id', $id)->firstOrFail();
        $receipt = $appointment->receipt;
        $review = $appointment->review;

        $appointment->delete();

        if ($receipt) {
            $receipt->delete();
        }
        if ($review) {
            $review->delete();
        }


        return redirect()->route('appointmentList.index')->with('success', 'Appuntamento eliminato con successo!');
    }



    //Funzione serviceList
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function serviceList(Request $request)
    {
        $query = $request->input('query');

        $services = Service::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('service_id', 'like', "%{$query}%")
                    ->orWhere('name', 'like', "%{$query}%")
                     ->orWhere('description', 'like', "%{$query}%")
                     ->orWhere('price', 'like', "%{$query}%");
            })->paginate(10);

        $totalServices = Service::count();
        $totalEmployees = Employee::count();
        $totalCustomers = Customer::count();


        return view('Gestionale.owner.serviceList', compact('services', 'query','totalServices','totalEmployees','totalCustomers'));
    }

    //Funzione createService
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function createService()
    {
        return view('Gestionale.owner.serviceCreate');
    }

     //Funzione storeService
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function storeService(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:300',
            'price' => 'required|numeric|min:0',
        ]);

        Service::create($request->all());

        return redirect()->route('serviceList.index')->with('success', 'Servizio aggiunto con successo!');
    }
    //Funzione editService
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function editService($id)
    {
        $service = Service::where('service_id', $id)->firstOrFail();
        return view('Gestionale.owner.serviceEdit', compact('service'));
    }

    //Funzione updateService
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function updateService(Request $request, $id)
    {
         $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:300',
            'price' => 'required|numeric|min:0',
         ]);

        $service = Service::where('service_id', $id)->firstOrFail();
        $service->update($request->all());

        return redirect()->route('serviceList.index')->with('success', 'Servizio aggiornato con successo!');
    }

    //Funzione destroyService
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function destroyService($id)
    {
        $service = Service::where('service_id', $id)->firstOrFail();
        $service->delete();

        return redirect()->route('serviceList.index')->with('success', 'Servizio eliminato con successo!');
    }

    //Funzione productList
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function productList(Request $request)
{
    $query = $request->input('query');

    $products = Product::with('category')
        ->when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('products.product_id', 'like', "%{$query}%")
                ->orWhere('products.name', 'like', "%{$query}%")
                ->orWhere('products.description', 'like', "%{$query}%")
                ->orWhere('products.price', 'like', "%{$query}%") // Aggiunto il filtro per prezzo
                ->orWhereHas('category', function ($categoryQuery) use ($query) {
                    $categoryQuery->where('name', 'like', "%{$query}%"); // Aggiunto il filtro per categoria
                });
        })
        ->paginate(10);

        $totalProducts = Product::count();
        $totalCost = Product::sum('price');
        $totalAppointments = Appointment::count();

    return view('Gestionale.owner.productList', compact('products', 'query','totalProducts','totalCost','totalAppointments'));
}

    //Funzione createProduct
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function createProduct()
    {
        $categories = Category::all();
        return view('Gestionale.owner.productCreate', compact('categories'));
    }

    //Funzione storeProduct
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:300',
            'category_id' => 'required|exists:categories,category_id'
        ]);

        Product::create($request->all());

        return redirect()->route('productList.index')->with('success', 'Prodotto aggiunto con successo!');
    }

    //Funzione editProduct
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function editProduct($id)
    {
        $product = Product::where('product_id', $id)->firstOrFail();
        $categories = Category::all();
        return view('Gestionale.owner.productEdit', compact('product', 'categories'));
    }

     //Funzione updateProduct
     //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function updateProduct(Request $request, $id)
    {
          $request->validate([
             'name' => 'required|string|max:100',
             'price' => 'required|numeric|min:0',
             'description' => 'nullable|string|max:300',
             'category_id' => 'required|exists:categories,category_id'
          ]);

        $product = Product::where('product_id', $id)->firstOrFail();
        $product->update($request->all());

        return redirect()->route('productList.index')->with('success', 'Prodotto aggiornato con successo!');
    }

   //Funzione destroyProduct
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function destroyProduct($id)
    {
        $product = Product::where('product_id', $id)->firstOrFail();
        $product->delete();

        return redirect()->route('productList.index')->with('success', 'Prodotto eliminato con successo!');
    }


    //Funzione reviewList
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function reviewList(Request $request)
    {
        $query = $request->input('query');

        $reviews = Review::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('review_id', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%")
                     ->orWhere('appointment_id', 'like', "%{$query}%");
            })->paginate(10);

        $totalReviews = Review::count();
        $totalCustomers = Customer::count();
        $totalAppointments = Appointment::count();

        return view('Gestionale.owner.reviewList', compact('reviews', 'query','totalReviews','totalCustomers','totalAppointments'));
    }

    //Funzione createReview
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
     public function createReview()
    {
        $appointments = Appointment::all();
        return view('Gestionale.owner.reviewCreate', compact('appointments'));
    }

    //Funzione storeReview
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function storeReview(Request $request)
    {
         $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'description' => 'nullable|string|max:500',
            'appointment_id' => 'required|exists:appointments,appointment_id',
         ]);

        Review::create($request->all());

        return redirect()->route('reviewList.index')->with('success', 'Recensione aggiunta con successo!');
    }

    //Funzione editReview
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function editReview($id)
    {
         $review = Review::where('review_id', $id)->firstOrFail();
          $appointments = Appointment::all();
         return view('Gestionale.owner.reviewEdit', compact('review','appointments'));
    }

    //Funzione updateReview
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function updateReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'description' => 'nullable|string|max:500',
            'appointment_id' => 'required|exists:appointments,appointment_id',
         ]);

        $review = Review::where('review_id', $id)->firstOrFail();
        $review->update($request->all());

        return redirect()->route('reviewList.index')->with('success', 'Recensione aggiornata con successo!');
    }

    //Funzione destroyReview
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function destroyReview($id)
    {
        $review = Review::where('review_id', $id)->firstOrFail();
        $review->delete();

        return redirect()->route('reviewList.index')->with('success', 'Recensione eliminata con successo!');
    }


    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    // Funzione employeeList
    public function employeeList(Request $request)
{
    $query = $request->input('query');

    $employees = Employee::with('phones') // Carica le relazioni 'phones'
        ->when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('employee_id', 'like', "%{$query}%")
                ->orWhere('name', 'like', "%{$query}%")
                ->orWhere('lastName', 'like', "%{$query}%")
                ->orWhere('email', 'like', "%{$query}%")
                ->orWhere('gender', 'like', "%{$query}%")
                ->orWhere('tax_code', 'like', "%{$query}%")
                ->orWhere('age', 'like', "%{$query}%")
                ->orWhere('date_of_birth', 'like', "%{$query}%")
                ->orWhere('salary', 'like', "%{$query}%")
                ->orWhere('date_of_hire', 'like', "%{$query}%")
                ->orWhereHas('phones', function ($phoneQuery) use ($query) {
                    $phoneQuery->where('number', 'like', "%{$query}%");
                });
        })->paginate(10);

    // Calcolo dei totali
    $totalEmployees = Employee::count();
    $totalMales = Employee::where('gender', 'M')->count();
    $totalFemales = Employee::where('gender', 'F')->count();

    // Passaggio delle informazioni alla vista
    return view('Gestionale.owner.employeeList', compact('employees', 'query', 'totalEmployees', 'totalMales', 'totalFemales'));
}

    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    // Funzione per creare un nuovo dipendente (modulo)
    public function create()
    {
        return view('Gestionale.owner.employeeCreate');
    }

    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function store(Request $request)
    {
        \Log::info('Inizio store');
        $request->validate([
            'email' => 'required|email|unique:employees,email',
            'tax_code' => 'required|string|size:16|unique:employees,tax_code',
            'name' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'username' => 'required|string|max:30|unique:employees,username',
            'password' => 'required|string',
            'date_of_birth' => 'required|date|before_or_equal:today',
            'salary' => 'required|numeric|min:0.01',
            'gender' => 'required|in:M,F',
            'date_of_hire' => 'required|date|after:date_of_birth',
        ]);
        \Log::info('Validazione superata');
        $data = $request->all();
        $data['password'] = bcrypt($request->input('password'));
       // Calcola l'età qui prima della creazione
        $data['age'] = Carbon::parse($data['date_of_birth'])->age;
          // Crea il dipendente
         $employee = Employee::create($data);
        // Gestione dei telefoni
          $phonesToCreate = $request->input('phones', []);
           foreach ($phonesToCreate as $phone) {
            $newPhoneModel = new Phone();
            $newPhoneModel->number = $phone;
             $newPhoneModel->employee_id = $employee->employee_id;
             $newPhoneModel->save();
             }

        return redirect()->route('employeesList.index')->with('success', 'Dipendente creato con successo.');
    }


    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    // Funzione per modificare un dipendente (modulo)
    public function edit($id)
    {
        $employee = Employee::with('phones')->where('employee_id', $id)->firstOrFail();
        \Log::info('Caricato employee per modifica: ', $employee->toArray());

        return view('Gestionale.owner.employeeEdit', compact('employee'));
    }


    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    // Funzione per aggiornare un dipendente esistente

    public function update(Request $request, $id)
    {
        \Log::info('Entrato in update con ID: ' . $id);
        $employee = Employee::with('phones')->where('employee_id', $id)->firstOrFail(); // Usa where con employee_id
        \Log::info('Trovato employee (prima update): ', $employee->toArray());
        \Log::info('Dati ricevuti: ', $request->all());
        $request->validate([
            'email' => 'required|email|unique:employees,email,' . $id . ',employee_id',
            'tax_code' => 'required|string|size:16|unique:employees,tax_code,' . $id . ',employee_id',
            'name' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'username' => 'required|string|max:30|unique:employees,username,' . $id . ',employee_id',
            'password' => 'nullable|string|min:8',
            'date_of_birth' => 'required|date|before_or_equal:today',
            'salary' => 'required|numeric|min:0.01',
            'gender' => 'required|in:M,F',
            'date_of_hire' => 'required|date|after:date_of_birth',
        ]);

           // Calcola l'età qui prima dell'update
        $data = $request->except(['_token', '_method', 'phones']);
          $data['age'] = Carbon::parse($data['date_of_birth'])->age;
            \Log::info('Dati prima della fill: ', $data);
          $employee->fill($data);
          $employee->save();
            \Log::info('Dati dopo della fill: ', $employee->toArray());
         //Gestione dei telefoni
        $phonesToUpdate = $request->input('phones', []);

         //Aggiornamento dei telefoni esistenti
         if($employee->phones){
             foreach($employee->phones as $phone){
                if(isset($phonesToUpdate[$phone->number])){
                 $phone->number = $phonesToUpdate[$phone->number];
                 $phone->save();
                   unset($phonesToUpdate[$phone->number]);
               }else{
                $phone->delete();
                 }
          }
       }
          // Aggiunta nuovi telefoni
         foreach ($phonesToUpdate as $newPhone){
            $newPhoneModel = new Phone();
            $newPhoneModel->number = $newPhone;
            $newPhoneModel->employee_id = $id;
            $newPhoneModel->save();
            }

        \Log::info('Dipendente aggiornato con successo.');
        \Log::info('Redirezione a employeesList.index');

        return redirect()->route('employeesList.index')->with('success', 'Dipendente aggiornato con successo.');
    }

    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    // Funzione per eliminare un dipendente
    public function destroy($id)
    {
        $employee = Employee::where('employee_id', $id)->firstOrFail();

        try {
            // Se l'eliminazione dell'impiegato ha successo, elimina anche i telefoni
            \DB::table('phones')->where('employee_id', $employee->employee_id)->delete();
            // Tenta di eliminare l'impiegato. Se fallisce, l'eccezione verrà catturata
            $employee->delete();



            return redirect()->route('employeesList.index')->with('success', 'Dipendente eliminato con successo.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('employeesList.index')->with('error', 'Impossibile eliminare il dipendente perché è associato ad uno o più appuntamenti.');
            } else {
                //Gestione di altre eccezioni
                throw $e;
                //oppure: return redirect()->route('employeesList.index')->with('error', 'Errore durante l\'eliminazione del dipendente.');

            }
        }
    }

    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------


//Funzione receiptList
public function receiptList(Request $request)
{
    $query = $request->input('query');

    $receipts = Receipt::with('payment_method', 'appointment')
        ->when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('receipt_id', 'like', "%{$query}%")
                ->orWhere('issue_date', 'like', "%{$query}%")
                ->orWhere('total', 'like', "%{$query}%")
                ->orWhereHas('payment_method', function ($paymentMethodQuery) use ($query) {
                    $paymentMethodQuery->where('type', 'like', "%{$query}%");
                });
        })->paginate(10);

    $totalReceipts = Receipt::count();
    $totalAppointments = Appointment::count();
    $totalCost = Receipt::sum('total');

    return view('Gestionale.owner.receiptList', compact('receipts', 'query','totalReceipts','totalAppointments','totalCost'));
}
//Funzione createRecipt
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function createReceipt()
    {
        $paymentMethods = Payment_method::all(); // Recupera i metodi di pagamento disponibili
        return view('Gestionale.owner.createReceipt', compact('paymentMethods'));
    }
//Funzione storeReceipt
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
public function storeReceipt(Request $request)
{

    $request->validate([
        'issue_date' => 'required|date',
        'total' => 'required|numeric|min:0', // Validazione: total deve essere >= 0
        'payment_method_id' => 'required|exists:payment_methods,payment_method_id',
    ]);
    Receipt::create($request->all());

    return redirect()->route('receiptList.index')->with('success', 'Scontrino aggiunto con successo!');
}

//Funzione editReceipt
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function editReceipt($id)
    {
        $receipt = Receipt::findOrFail($id);
        $paymentMethods = Payment_method::all();
        return view('Gestionale.owner.receiptEdit', compact('receipt', 'paymentMethods'));
    }
//Funzione updateReceipt
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
public function updateReceipt(Request $request, $id)
{
     $request->validate([
        'issue_date' => 'required|date',
         'total' => 'required|numeric|min:0',
        'payment_method_id' => 'required|exists:payment_methods,payment_method_id',
    ]);

    $receipt = Receipt::where('receipt_id', $id)->firstOrFail();
    $receipt->update($request->all());

    return redirect()->route('receiptList.index')->with('success', 'Scontrino aggiornato con successo!');
}
//Funzione destroyReceipt
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
public function destroyReceipt($id)
{
    $receipt = Receipt::findOrFail($id);

    try {
        $receipt->delete();
        return redirect()->route('receiptList.index')->with('success', 'Scontrino eliminato con successo!');
    } catch (\Illuminate\Database\QueryException $e) {
        if ($e->getCode() == '23000') {
            return redirect()->route('receiptList.index')->with('error', 'Impossibile eliminare lo scontrino perché è associato ad uno o più appuntamenti.');
        } else {
           throw $e;
        }
    }
}

 //Funzione supplierList
 public function supplierList(Request $request)
 {
     $query = $request->input('query');

     $suppliers = Supplier::when($query, function ($queryBuilder) use ($query) {
         $queryBuilder->where('supplier_id', 'like', "%{$query}%")
             ->orWhere('name', 'like', "%{$query}%")
             ->orWhere('email', 'like', "%{$query}%")
              ->orWhere('address', 'like', "%{$query}%")
             ->orWhere('contract_status', 'like', "%{$query}%")
               ->orWhere('rating', 'like', "%{$query}%")
                ->orWhere('phone', 'like', "%{$query}%");
     })->paginate(10);

     $totalSuppliers = Supplier::count();
     $totalActive = Supplier::where('contract_status','Active')->count();
     $totalSuspended= Supplier::where('contract_status','Suspended')->count();

     return view('Gestionale.owner.supplierList', compact('suppliers', 'query','totalSuppliers','totalActive','totalSuspended'));
 }
//Funzione createSupplier
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
     public function createSupplier()
    {
        return view('Gestionale.owner.supplierCreate');
    }
//Funzione storeSupplier
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
public function storeSupplier(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:50',
        'email' => 'required|email|unique:suppliers,email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:300',
        'contract_status' => 'required|in:Active,Suspended',
        'rating' => 'required|numeric|min:0|max:10', // Validazione del rating
    ]);
    Supplier::create($request->all());

    return redirect()->route('supplierList.index')->with('success', 'Fornitore aggiunto con successo!');
}
//Funzione editSupplier
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function editSupplier($id)
    {
        $supplier = Supplier::where('supplier_id', $id)->firstOrFail();
        return view('Gestionale.owner.supplierEdit', compact('supplier'));
    }
//Funzione updateSupplier
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
public function updateSupplier(Request $request, $id)
{
      $request->validate([
        'name' => 'required|string|max:100',
         'email' => 'required|email|unique:suppliers,email,'. $id .',supplier_id',
        'address' => 'required|string|max:255',
        'contract_status' => 'required|string|max:50',
         'rating' => 'required|numeric|min:0|max:10',
          'phone' => 'nullable|string|max:20',
    ]);

    $supplier = Supplier::where('supplier_id', $id)->firstOrFail();
   $supplier->update($request->all());

    return redirect()->route('supplierList.index')->with('success', 'Fornitore aggiornato con successo!');
}

//Funzione destroySupplier
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function destroySupplier($id)
    {
        $supplier = Supplier::where('supplier_id', $id)->firstOrFail();
        $supplier->delete();

        return redirect()->route('supplierList.index')->with('success', 'Fornitore eliminato con successo!');
    }
//Funzione customerList
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
public function customerList(Request $request)
{
    $query = $request->input('query');

    $customers = Customer::with('phones')
        ->when($query, function ($queryBuilder) use ($query) {
             $queryBuilder->where(function ($whereBuilder) use ($query) {
                   $whereBuilder->where('customer_id', 'like', "%{$query}%")
                       ->orWhere('name', 'like', "%{$query}%")
                       ->orWhere('lastname', 'like', "%{$query}%")
                       ->orWhere('date_of_birth', 'like', "%{$query}%")
                       ->orWhere('gender', 'like', "%{$query}%")
                       ->orWhereHas('phones', function ($phoneQuery) use ($query) {
                             $phoneQuery->where('number', 'like', "%{$query}%");
                       });
                    if (is_numeric($query)){
                         $whereBuilder->orWhere('age', '=', (int)$query);
                    }
                  });
        })->paginate(10);

    $totalCustomers = Customer::count();
    $totalMales = Customer::where('gender', 'M')->count();
    $totalFemales = Customer::where('gender', 'F')->count();

    return view('Gestionale.owner.customerList', compact('customers', 'query','totalCustomers','totalMales','totalFemales'));
}
 //Funzione createCustomer
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function createCustomer()
    {
         return view('Gestionale.owner.customerCreate');
    }
//Funzione storeCustomer
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

public function storeCustomer(Request $request)
{
     $request->validate([
        'name' => 'required|string|max:50',
        'lastname' => 'required|string|max:50',
        'date_of_birth' => 'required|date|before_or_equal:today',
         'gender' => 'required|in:M,F',
    ]);

     $data = $request->all();
      // Calcola l'età qui prima della creazione
    $data['age'] = Carbon::parse($data['date_of_birth'])->age;
       // Crea il cliente
     $customer = Customer::create($data);
    // Gestione dei telefoni
      $phonesToCreate = $request->input('phones', []);
       foreach ($phonesToCreate as $phone) {
        $newPhoneModel = new Phone();
        $newPhoneModel->number = $phone;
         $newPhoneModel->customer_id = $customer->customer_id;
         $newPhoneModel->save();
         }

    return redirect()->route('customerList.index')->with('success', 'Cliente aggiunto con successo!');
}
//Funzione editCustomer
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function editCustomer($id)
    {
        $customer = Customer::where('customer_id', $id)->firstOrFail();
        return view('Gestionale.owner.customerEdit', compact('customer'));
    }
    //Funzione updateCustomer
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function updateCustomer(Request $request, $id)
    {
         $request->validate([
            'name' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'date_of_birth' => 'required|date|before_or_equal:today',
            'gender' => 'required|in:M,F',
         ]);
         $customer = Customer::with('phones')->where('customer_id', $id)->firstOrFail();
          $data = $request->except(['_token', '_method', 'phones']);
          // Calcola l'età qui prima della fill
          $data['age'] = Carbon::parse($data['date_of_birth'])->age;
          $customer->fill($data);
          $customer->save();

            //Gestione dei telefoni
        $phonesToUpdate = $request->input('phones', []);

         //Aggiornamento dei telefoni esistenti
         if($customer->phones){
             foreach($customer->phones as $phone){
                if(isset($phonesToUpdate[$phone->number])){
                 $phone->number = $phonesToUpdate[$phone->number];
                 $phone->save();
                   unset($phonesToUpdate[$phone->number]);
               }else{
                $phone->delete();
                 }
          }
       }
          // Aggiunta nuovi telefoni
         foreach ($phonesToUpdate as $newPhone){
            $newPhoneModel = new Phone();
            $newPhoneModel->number = $newPhone;
            $newPhoneModel->customer_id = $id;
            $newPhoneModel->save();
            }

        return redirect()->route('customerList.index')->with('success', 'Cliente aggiornato con successo!');
    }
//Funzione destroyCustomer
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function destroyCustomer($id)
    {
        $customer = Customer::where('customer_id', $id)->first();

        if (!$customer) {
            return redirect()->route('customerList.index')->with('error', 'Cliente non trovato.');
        }
        try {
            \DB::table('phones')->where('customer_id', $customer->customer_id)->delete();
            $customer->delete();

            return redirect()->route('customerList.index')->with('success', 'Cliente eliminato con successo.');
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->getCode() == '23000') {
                return redirect()->route('customerList.index')->with('error', 'Impossibile eliminare il cliente perché è associato ad uno o più appuntamenti.');
            } else {
                throw $e;
            }
        }
    }
//Funzione customerList
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

}
