@extends('layouts.app')

@section('content')

    <div class="col-md-10 m-auto">

        <div class="card sm-hidden">

            <div class="card-header"><h4>{{ __('Edit a Suburb') }}</h4></div>

            <div class="card-body">
                <form method="post" action="{{ route('suburb.update', ['id' => $suburbs->id]) }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input type="text" name="name"  class="form-control d-flex ml-auto mr-auto {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ $suburbs->name }}"/>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="postal" class="col-md-4 col-form-label text-md-right">{{ __('Postal code') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="postal" class="form-control{{ $errors->has('postal') ? ' is-invalid' : '' }}" name="postal" value="{{ $suburbs->postalcode }}"/>

                            @if ($errors->has('postal'))
                                <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('postal') }}</strong>
                                                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success pull-right" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>




@endsection
