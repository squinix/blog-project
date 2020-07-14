<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;
use App\Events\NewCustomerHasRegistredEvent;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $customers = Customer::with('company')->paginate('15');

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

    public function store()
    {
        $this->authorize('create', Customer::class);

        $customer = Customer::create($this->validateRequest());

        event(new NewCustomerHasRegistredEvent($customer));

        //return redirect('customers');
    }

    public function show(Customer $customer)
    {
        // Není potřeba fetchovat, už sme to udělali Customer $customer, díky laravel funkci Route Model Binding 
        // (v web.php -> route musí být proměnná v {} mít stejné jméno jako zda v metodě ($customer))
        // $customer = Customer::where('id', $customer)->firstOrFail();

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());

        return redirect('customers/' . $customer->id)->with('message', 'Thanks for your edit.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('/customers');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email:rfc,dns',
            'active' => 'required',
            'company_id' => 'required'
        ]);
    }
}
