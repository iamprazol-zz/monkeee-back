@extends('layouts.app')

@section('content')

    <div class="col-md-10 m-auto">

        <div class="card sm-hidden">

            <div class="card-header"><h4>{{ __('Add a Suburb') }}</h4></div>

            <div class="card-body">
                <form method="post" action="{{ route('suburb.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="city_id" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                        <div class="col-md-6">
                            <select name="city_id" class="custom-select" id="city_id" required>
                                <option value="" selected="">Choose One</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input type="text" name="name"  class="form-control d-flex ml-auto mr-auto {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Enter the Suburb name" value="{{ old('name') }}"/>

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
                            <input type="text" id="postal" class="form-control{{ $errors->has('postal') ? ' is-invalid' : '' }}" name="postal" placeholder="Enter the Suburb postal code" value="{{ old('postal') }}"/>

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
