@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            dal {{ $dashboard->from }}
            <div class="card text-center">
                Uscite <span class="text-danger display-4">-{{ $dashboard->exit }}€</span>
            </div>
            <div class="card text-center mt-2">
                Entrate <span class="text-success display-4">+{{ $dashboard->entry }}€</span>
            </div>
            <form action="{{ route('transaction.create') }}" class="w-100 mt-2">
                <button type="submit" class="btn btn-outline-primary w-100">Aggiungi transazione</button>
            </form>
        </div>
    </div>
</div>
@endsection
