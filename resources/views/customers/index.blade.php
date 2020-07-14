@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <h1>
        Customers
    </h1>
    @can('create', App\Customer::class)
        <p>
            <a href="{{ route('customers.create') }}">
                Add New Customer
            </a>
        </p>
    @endcan

    <div class="row">
        <div class="col">
            <h3>
                Customers
            </h3>
            <p>
                @foreach ($customers as $customer)
                    <p>
                        <a href="{{ route('customers.show', ['customer' => $customer]) }}">
                            {{ $customer->name }}, {{ $customer->email }}, {{ $customer->active }}, {{ $customer->company->name }}
                        </a>
                    </p>
                @endforeach
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            {{ $customers->links() }}
        </div>
    </div>

{{--     <div class="row">
        <div class="col">
            @foreach ($companies as $company)
                <h3>
                    {{ $company->name }}
                </h3>
                <ul>
                    @foreach ($company->customers as $customer)
                        <li>
                            {{ $customer->name }}
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div> --}}

@endsection