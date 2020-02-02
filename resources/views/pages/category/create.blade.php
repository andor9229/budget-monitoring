@extends('layouts.app')


@section('content')
    <form method="POST" action="{{ route('category.store') }}">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name">
                @if ($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="amount" class="col-sm-2 col-form-label">Budget</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="amount">
                @if ($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
            </div>

        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-outline-primary">Aggiungi Categoria</button>
        </div>
    </form>
@endsection

