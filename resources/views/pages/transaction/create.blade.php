@extends('layouts.app')


@section('content')
    <form method="POST" action="{{ route('transaction.store') }}">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Entrata/Uscita</label>
            <div class="col-sm-10">
                <input type="text" class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" name="amount">
                @if ($errors->has('amount'))
                    <div class="invalid-feedback">{{ $errors->first('amount') }}</div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="amount" class="col-sm-2 col-form-label">Pagato a/da</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="payee">
                @if ($errors->has('payee'))
                    <span class="text-danger">{{ $errors->first('payee') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="amount" class="col-sm-2 col-form-label"a</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="paid">
                    <label class="form-check-label" for="exampleCheck1">Pagato</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="amount" class="col-sm-2 col-form-label">Categoria</label>
            <div class="col-sm-10">
                <select class="form-control" name="category_id">
                    <option value="">Nessuna Categoria</option>
                    @foreach(\App\Models\Category\Category::all() as $category)
                        <option value="{{ $category->id }}" class="text-uppercase">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="amount" class="col-sm-2 col-form-label">Tipo</label>
            <div class="col-sm-10">
                <select class="form-control" name="transaction_type">
                    @foreach(\App\Models\Transaction\Transaction::TYPES as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-outline-primary">Aggiungi Categoria</button>
        </div>
    </form>
@endsection

