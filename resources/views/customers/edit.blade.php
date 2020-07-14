@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <h1>
        Customer Edit {{ $customer->name }}
    </h1>

    <form action=" {{ route('customers.update', ['customer' => $customer]) }}" method="POST">
        @method('PATCH')
        @include('customers.form')

        <button type="submit" class="">
            Save Customer
        </button>
    </form>

@endsection