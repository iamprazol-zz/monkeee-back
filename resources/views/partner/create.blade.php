@extends('layouts.app')

@section('content')

    <div class="col-md-10 m-auto">

        <div class="card sm-hidden">

            <div class="card-header"><h4>{{ __('Add a Partner') }}</h4></div>

            <div class="card-body">
                <form method="post" action="{{ route('partner.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input type="text" name="name"  class="form-control d-flex ml-auto mr-auto {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Enter the partner name" value="{{ old('name') }}" required>

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
                        <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Partner Category') }}</label>

                        <div class="col-md-6">
                            <select name="category_id" class="custom-select" id="category_id" required>
                                <option value="" selected="">Choose One</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right" >{{ __('Description') }}</label>

                        <div class="col-sm-7">
                            <textarea rows="5" cols="40" type="text" id="description" class="form-control" name="description" placeholder="Write something about the partner" required autofocus>{{ old('description') }}</textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                        <div class="col-sm-6">
                            <input id="address" type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Enter the partner's address" value="{{ old('address') }}" required autofocus>

                            @if ($errors->has('address'))
                                <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('address') }}</strong>
                                                        </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right" >{{ __('Email') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="email" class="form-control" name="email" placeholder="Enter the partner's email" value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobile" class="col-md-4 col-form-label text-md-right" >{{ __('Mobile') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Enter the partner mobile ( not mandatory )" value="{{ old('mobile') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="facebook" class="col-md-4 col-form-label text-md-right" >{{ __('Facebook') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="facebook" class="form-control" name="facebook" placeholder="Enter the partner facebook link ( not mandatory )" value="{{ old('facebook') }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="instagram" class="col-md-4 col-form-label text-md-right">{{ __('Instagram') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="instagram" class="form-control" name="instagram" placeholder="Enter the partner instagram link ( not mandatory )" value="{{ old('instagram') }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="website" class="form-control" name="website" placeholder="Enter the partner website link ( not mandatory )" value="{{ old('website') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pic" class="col-md-4 col-form-label text-md-right" >{{ __('Upload a pic') }}</label>

                        <div class="col-md-6">
                            <input type="file" id="pic" name="pic" class="form-control{{ $errors->has('pic') ? ' is-invalid' : '' }}" placeholder="Choose a partner pic to upload" value="{{ old('pic') }}" required/>
                            @if ($errors->has('pic'))
                                <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('pic', 'Image size must be less than 15 MB')}}</strong>
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
