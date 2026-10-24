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

class EmployeeController extends Controller
{
    // Funzione Home
    public function home()
    {
        $user = Auth::guard('employee')->user();

        if (!$user) {
            return redirect()->route('login')->withErrors([
                'error' => 'Accesso non autorizzato. Sei stato disconnesso.',
            ]);
        }

        $totalAppointments = Appointment::count();
        $totalProducts = Product::count();
        $totalReviews = Review::count();
        $totalCustomers = Customer::count();

        return view('Gestionale.employee.home', compact('totalAppointments',  'totalProducts', 'totalReviews', 'totalCustomers'));

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

        return view('Gestionale.employee.appointmentList', compact('appointments', 'query', 'selectedDate', 'showAll','totalAppointments','totalReviews','totalReceipts'));
    }

    //Funzione createAppointment
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function createAppointment()
    {
        $customers = Customer::all();
        $employees = Employee::all();
        $halls = Hall::all();
        return view('Gestionale.employee.appointmentCreate', compact('customers', 'employees', 'halls'));
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

        return redirect()->route('appointmentList.index2')->with('success', 'Appuntamento aggiunto con successo!');
    }

     //Funzione editAppointment
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
     public function editAppointment($id)
    {
        $appointment = Appointment::where('appointment_id', $id)->firstOrFail();
          $customers = Customer::all();
          $employees = Employee::all();
          $halls = Hall::all();
         return view('Gestionale.employee.appointmentEdit', compact('appointment', 'customers', 'employees', 'halls'));
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

        return redirect()->route('appointmentList.index2')->with('success', 'Appuntamento aggiornato con successo!');
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

        return redirect()->route('appointmentList.index2')->with('success', 'Appuntamento eliminato con successo!');
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

    return view('Gestionale.employee.productList', compact('products', 'query','totalProducts','totalCost','totalAppointments'));
}

    //Funzione createProduct
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function createProduct()
    {
        $categories = Category::all();
        return view('Gestionale.employee.productCreate', compact('categories'));
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

        return redirect()->route('productList.index2')->with('success', 'Prodotto aggiunto con successo!');
    }

    //Funzione editProduct
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function editProduct($id)
    {
        $product = Product::where('product_id', $id)->firstOrFail();
        $categories = Category::all();
        return view('Gestionale.employee.productEdit', compact('product', 'categories'));
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

        return redirect()->route('productList.index2')->with('success', 'Prodotto aggiornato con successo!');
    }

   //Funzione destroyProduct
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function destroyProduct($id)
    {
        $product = Product::where('product_id', $id)->firstOrFail();
        $product->delete();

        return redirect()->route('productList.index2')->with('success', 'Prodotto eliminato con successo!');
    }

    //Funzione reviewList
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function reviewList(Request $request)
    {
        $query = $request->input('query');

        $reviews = Review::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('review_id', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%")
                    ->orWhere('rating', 'like', "%{$query}%")
                     ->orWhere('appointment_id', 'like', "%{$query}%");
            })->paginate(10);

        $totalReviews = Review::count();
        $totalCustomers = Customer::count();
        $totalAppointments = Appointment::count();

        return view('Gestionale.employee.reviewList', compact('reviews', 'query','totalReviews','totalCustomers','totalAppointments'));
    }

    //Funzione createReview
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
     public function createReview()
    {
        $appointments = Appointment::all();
        return view('Gestionale.employee.reviewCreate', compact('appointments'));
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

        return redirect()->route('reviewList.index2')->with('success', 'Recensione aggiunta con successo!');
    }

    //Funzione editReview
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function editReview($id)
    {
         $review = Review::where('review_id', $id)->firstOrFail();
          $appointments = Appointment::all();
         return view('Gestionale.employee.reviewEdit', compact('review','appointments'));
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

        return redirect()->route('reviewList.index2')->with('success', 'Recensione aggiornata con successo!');
    }

    //Funzione destroyReview
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function destroyReview($id)
    {
        $review = Review::where('review_id', $id)->firstOrFail();
        $review->delete();

        return redirect()->route('reviewList.index2')->with('success', 'Recensione eliminata con successo!');
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

    return view('Gestionale.employee.customerList', compact('customers', 'query','totalCustomers','totalMales','totalFemales'));
}
 //Funzione createCustomer
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function createCustomer()
    {
         return view('Gestionale.employee.customerCreate');
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

    return redirect()->route('customerList.index2')->with('success', 'Cliente aggiunto con successo!');
}
//Funzione editCustomer
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function editCustomer($id)
    {
        $customer = Customer::where('customer_id', $id)->firstOrFail();
        return view('Gestionale.employee.customerEdit', compact('customer'));
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

        return redirect()->route('customerList.index2')->with('success', 'Cliente aggiornato con successo!');
    }
//Funzione destroyCustomer
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function destroyCustomer($id)
    {
        $customer = Customer::where('customer_id', $id)->first();

        if (!$customer) {
            return redirect()->route('customerList2.index')->with('error', 'Cliente non trovato.');
        }
        try {
            $customer->delete();
            \DB::table('phones')->where('customer_id', $customer->customer_id)->delete();
            return redirect()->route('customerList2.index')->with('success', 'Cliente eliminato con successo.');
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->getCode() == '23000') {
                return redirect()->route('customerList.index2')->with('error', 'Impossibile eliminare il cliente perché è associato ad uno o più appuntamenti.');
            } else {
                throw $e;
            }
        }
    }

}
