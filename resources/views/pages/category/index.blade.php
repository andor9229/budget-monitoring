@extends('layouts.app')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ \Illuminate\Support\Facades\Session::get('status')}}
        </div>
    @endif

    @if(\App\Models\Account\Account::count())
        <form action="{{ route('account.create') }}" class="mb-4 text-right">
            <button type="submit" class="btn btn-outline-primary">Aggiungi account</button>
        </form>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Risparmio Iniziale</th>
                <th scope="col">Valuta</th>
            </tr>
            </thead>
            <tbody>
            @foreach(\App\Models\Account\Account::all() as $account)
            <tr>
                <th scope="row">{{ $account->id }}</th>
                <td class="text-capitalize">{{ $account->name }}</td>
                <td>{{ $account->amount }}</td>
                <td>{{ $account->currency->name }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="card">
            <div class="card-body">
                Non è presente nessun account.
                <form action="{{ route('account.create') }}" class="text-right">
                    <button type="submit" class="btn btn-outline-primary">Aggiungi account</button>
                </form>
            </div>
        </div>
    @endif
@endsection

