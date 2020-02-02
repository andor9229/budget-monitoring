@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('goal.store') }}">
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
            <label for="percentage" class="col-sm-2 col-form-label">Percentuale sul risparmiato</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="percentage">
                @if ($errors->has('percentage'))
                    <span class="text-danger">{{ $errors->first('percentage') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="amount" class="col-sm-2 col-form-label">Totale obiettivo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="amount">
                @if ($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="amount" class="col-sm-2 col-form-label">Obiettivo da raggiungere entro il</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="expire_at">
                @if ($errors->has('expire_at'))
                    <span class="text-danger">{{ $errors->first('expire_at') }}</span>
                @endif
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-outline-primary">Aggiungi Obiettivo</button>
        </div>
    </form>
@endsection

