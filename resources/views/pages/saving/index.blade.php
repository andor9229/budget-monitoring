@extends('layouts.app')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ \Illuminate\Support\Facades\Session::get('status')}}
        </div>
    @endif
    <form action="{{ route('goal.create') }}" class="mb-4 text-right">
        <button type="submit" class="btn btn-outline-primary">Aggiungi Obiettivo</button>
    </form>
    <p>Risparmi senza gli obiettivi: {{ $account->getSaving() }}</p>
    <p>Risparmi: {{ $account->getSavingsWithGoals() }}</p>

    @forelse($goals as $goal)
        Accumulato: {{ $goal->getPercentage() }}
        Obiettivo: {{ $goal->amount }}
    @empty

    @endforelse
@endsection

