@extends('layouts.app')

@section('content')

        <div class="col-md-10 m-auto">

            <div class="card sm-hidden">

                <div class="card-header"><h4>{{ __('Add a Club') }}</h4></div>

                <div class="card-body">
                    <form method="post" action="{{ route('club.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="name"  class="form-control d-flex ml-auto mr-auto {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Enter Club name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="suburb_id" class="col-md-4 col-form-label text-md-right">{{ __('Suburb') }}</label>

                            <div class="col-md-6">
                                <select name="suburb_id" class="custom-select" id="suburb_id" required>
                                    <option value="" selected="">Choose One</option>
                                    @foreach($suburbs as $suburb)
                                    <option value="{{ $suburb->id }}">{{ $suburb->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-sm-6">
                                <input id="address" type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Enter the club's address" value="{{ old('resident') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('address') }}</strong>
                                                        </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-sm-7">
                                <input type="text" id="description" class="form-control" name="description" placeholder="Write something about the club " value="{{ old('description') }}" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="order" class="col-md-4 col-form-label text-md-right">{{ __('Order') }}</label>

                            <div class="col-sm-7">
                                <input type="text" id="order" class="form-control{{ $errors->has('order') ? ' is-invalid' : '' }}" name="order" placeholder="Enter the order number" value="{{ old('order') }}" required>

                                @if ($errors->has('order'))
                                    <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('order') }}</strong>
                                                        </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-sm-7">
                                <input type="tel" id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Enter the club's contact number " value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                        </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-sm-7">
                                <input type="text" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="eg. club@gmail.com" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="opening" class="col-md-4 col-form-label text-md-right">{{ __('Opening Time') }}</label>

                            <div class="col-sm-7">
                                <input type="text" id="opening" class="form-control" name="opening" placeholder="Enter the club's opening time in am/pm" value="{{ old('opening') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="closing" class="col-md-4 col-form-label text-md-right">{{ __('Closing Time') }}</label>

                            <div class="col-sm-7">
                                <input type="text" id="closing" class="form-control" name="closing" placeholder="Enter the club's closing time in am/pm" value="{{ old('closing') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="days" class="col-md-4 col-form-label text-md-right">{{ __('Opening Days') }}</label>

                            <div class="col-sm-7">
                                <input type="text" id="days" class="form-control" name="days" placeholder="eg: Sun to Fri" value="{{ old('days') }}" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="facebook" class="col-md-4 col-form-label text-md-right">{{ __('Facebook') }}</label>

                            <div class="col-sm-7">
                                <input type="text" id="facebook" class="form-control" name="facebook" placeholder="Enter the club's facebook link ( not mandatory ) " value="{{ old('facebook') }}" >
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="instagram" class="col-md-4 col-form-label text-md-right">{{ __('Instagram') }}</label>

                            <div class="col-sm-7">
                                <input type="text" id="instagram" class="form-control" name="instagram" placeholder="Enter club's instagram link ( not mandatory ) " value="{{ old('instagram') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pic" class="col-md-4 col-form-label text-md-right">{{ __('Upload a cover pic') }}</label>

                            <div class="col-md-6">
                                <input type="file" id="pic" name="pic" class="form-control" required/>

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
