@extends('layouts.app')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ \Illuminate\Support\Facades\Session::get('status')}}
        </div>
    @endif

    @if($categories->count())
        <form action="{{ route('category.create') }}" class="mb-4 text-right">
            <button type="submit" class="btn btn-outline-primary">Aggiungi categoria</button>
        </form>
        @foreach($categories as $category)

            <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col text-left text-capitalize">{{ $category->name }}</div>
                    <div class="col text-right">{{ $category->amount }} {{ $category->account->currency->name }}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $category->getExitTransactions() *  100 / $category->amount }}%" aria-valuenow="{{ $category->getExitTransactions() * 100 / $category->amount }}" aria-valuemin="0" aria-valuemax="{{ $category->amount }}">{{ $category->getExitTransactions() }} {{ $category->account->currency->symbol }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="card">
            <div class="card-body">
                Non è presente nessuna categoria.
                <form action="{{ route('category.create') }}" class="text-right">
                    <button type="submit" class="btn btn-outline-primary">Aggiungi categoria</button>
                </form>
            </div>
        </div>
    @endif
@endsection

