@extends('layouts.app')

@section('content')
    @forelse($accounts as $account)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title text-capitalize">{{ $account->name }}</h5>
            <a href="{{ route('account.select', [ 'account' => $account->id]) }}" class="card-link">Seleziona Account</a>
        </div>
    </div>
    @empty
        <div class="card">
            <div class="card-body">
                Non è presente nessun account.
                <form action="{{ route('account.create') }}" class="text-right">
                    <button type="submit" class="btn btn-outline-primary">Aggiungi account</button>
                </form>
            </div>
        </div>
    @endforelse
@endsection
