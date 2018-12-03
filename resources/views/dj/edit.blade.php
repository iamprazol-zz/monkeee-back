@extends('layouts.app')

@section('content')

    <div class="col-md-10 m-auto">

        <div class="card sm-hidden">

            <div class="card-header"><h4>{{ __('Edit a Djay') }}</h4></div>

            <div class="card-body">
                <form method="post" action="{{ route('dj.update', ['id' => $djs->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input type="text" name="name"  class="form-control d-flex ml-auto mr-auto {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ $djs->name }}" required>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                        <div class="col-md-6">
                            <select name="category_id" class="custom-select" id="category_id" required>
                                <option value="" selected="">Choose One</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($category->id == $djs->category_id) selected="selected" @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="resident" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                        <div class="col-sm-6">
                            <input id="resident" type="text" class="form-control {{ $errors->has('resident') ? ' is-invalid' : '' }}" name="resident" value="{{ $djs->resident }}" required autofocus>

                            @if ($errors->has('resident'))
                                <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('resident') }}</strong>
                                                        </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="label" class="col-md-4 col-form-label text-md-right">{{ __('Label') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="lebel" class="form-control" name="label" value="{{ $djs->label }}" required>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                        <div class="col-sm-7">
                            <input type="tel" id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $djs->phone }}" required>

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
                            <input type="text" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $djs->email }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right" >{{ __('Bio') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="description" class="form-control" name="description"  value="{{ $djs->description }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="facebook" class="col-md-4 col-form-label text-md-right" >{{ __('Facebook') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="facebook" class="form-control" name="facebook" value="{{ $djs->facebook }}" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="instagram" class="col-md-4 col-form-label text-md-right">{{ __('Instagram') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="instagram" class="form-control" name="instagram" value="{{ $djs->instagram }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pic" class="col-md-4 col-form-label text-md-right" >{{ __('Upload a pic') }}</label>

                        <div class="col-md-6">
                            @if($djs->picture)
                                <img src="/images/{{ $djs->picture }}" style="width:150px; height:150px;">
                            @else
                                <p>No image found</p>
                            @endif
                            @if ($errors->has('pic'))
                                <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('pic', 'Image size must be less than 15 MB')}}</strong>
                                                        </span>
                            @endif
                            <input type="file" id="pic" name="pic" class="form-control{{ $errors->has('pic') ? ' is-invalid' : '' }}" value="{{ $djs->picture }}"  required/>
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
