@extends('layouts.app')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ \Illuminate\Support\Facades\Session::get('status')}}
        </div>
    @endif

    @if(\App\Models\Category\Category::count())
        <form action="{{ route('category.create') }}" class="mb-4 text-right">
            <button type="submit" class="btn btn-outline-primary">Aggiungi categoria</button>
        </form>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Budget</th>
                <th scope="col">Account</th>
            </tr>
            </thead>
            <tbody>
            @foreach(\App\Models\Category\Category::all() as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td class="text-capitalize">{{ $category->name }}</td>
                <td>{{ $category->amount }}</td>
                <td>{{ $category->account->name }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
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

