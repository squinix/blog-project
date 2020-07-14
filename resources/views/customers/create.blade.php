@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <h1>
        Customer Create
    </h1>

    <form action="{{ route('customers.store') }}" method="POST">
        @include('customers.form')

        <button type="submit" class="">
            Add Customer
        </button>
    </form>

@endsection