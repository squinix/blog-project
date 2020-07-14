@extends('layouts.app')

@section('title', 'Details for ' . $customer->name)

@section('content')
    <h1>
        Customer
    </h1>
    <p>
        <a href="{{ route('customers.edit', ['customer' => $customer]) }}">
            Edit Customer
        </a>

        <form action="/customers/{{ $customer->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" type="submit">
                Delete Customer
            </button>
        </form>
    </p>

    <div class="row">
        <div class="col">
            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    <strong>Success</strong> {{ session()->get('message') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>
                {{ $customer->name }} <br>
                {{ $customer->email }} <br>
                {{ $customer->company->name }} <br>
                {{ $customer->active }} <br>
            </p>
        </div>
    </div>

@endsection