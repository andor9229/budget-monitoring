@extends('layouts.app')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ \Illuminate\Support\Facades\Session::get('status')}}
        </div>
    @endif

    @if($transactions->count())
        <form action="{{ route('transaction.create') }}" class="mb-4 text-right">
            <button type="submit" class="btn btn-outline-primary">Aggiungi transazione</button>
        </form>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Uscita/Entrata</th>
                <th scope="col">Pagato a/da</th>
                <th scope="col">Pagato</th>
                <th scope="col">Pagato Il</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tipo</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <th scope="row">{{ $transaction->id }}</th>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->payee }}</td>
                <td>{{ $transaction->paid ? 'si' : 'no'}}</td>
                <td>{{ $transaction->paidOn }}</td>
                <td>{{ $transaction->getCategory() ?? '-' }}</td>
                <td>{{ $transaction->transaction_type }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="card">
            <div class="card-body">
                Non è presente nessuna transazione.
                <form action="{{ route('transaction.create') }}" class="text-right">
                    <button type="submit" class="btn btn-outline-primary">Aggiungi transazione</button>
                </form>
            </div>
        </div>
    @endif
@endsection

