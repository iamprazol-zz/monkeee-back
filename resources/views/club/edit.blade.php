@extends('layouts.app')

@section('content')

    <div class="col-md-10 m-auto">

        <div class="card sm-hidden">

            <div class="card-header"><h4>{{ __('Edit a Club') }}</h4></div>

            <div class="card-body">
                <form method="post" action="{{ route('club.update', ['id' => $clubs->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input type="text" name="name"  class="form-control d-flex ml-auto mr-auto {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"  value="{{ $clubs->name }}" required>

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
                                    <option value="{{ $suburb->id }}" @if($suburb->id == $clubs->suburb_id) selected="selected" @endif >{{ $suburb->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                        <div class="col-sm-6">
                            <input id="address" type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $clubs->address }}" required autofocus>

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
                            <textarea rows="5" cols="40" type="text" id="description" class="form-control" name="description"  required autofocus>{{ $clubs->description }}</textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="order" class="col-md-4 col-form-label text-md-right">{{ __('Order') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="order" class="form-control{{ $errors->has('order') ? ' is-invalid' : '' }}" placeholder="Enter order number" name="order" value="{{ $clubs->order  }}" required>

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
                            <input type="tel" id="phone" class="form-control" name="phone" value="{{ $clubs->phone }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="email" class="form-control" name="email" value="{{ $clubs->email }}">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="days" class="col-md-4 col-form-label text-md-right">{{ __('Opening Days') }}</label>

                        <div class="col-sm-7">
                            <textarea rows="5" cols="40" type="text" id="days" class="form-control" name="days" required>{{ $clubs->open }}</textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="facebook" class="col-md-4 col-form-label text-md-right">{{ __('Facebook') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="facebook" class="form-control" name="facebook" value="{{ $clubs->facebook }}" >
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="instagram" class="col-md-4 col-form-label text-md-right">{{ __('Instagram') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="instagram" class="form-control" name="instagram" value="{{ $clubs->instagram }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pic" class="col-md-4 col-form-label text-md-right" >{{ __('Upload a cover pic') }}</label>

                        <div class="col-md-6">
                            @if($clubs->cover_photo)
                                <img src="/images/{{ $clubs->cover_photo }}" style="width:150px; height:150px;">
                            @else
                                <p>No image found</p>
                            @endif
                            @if ($errors->has('pic'))
                                <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('pic', 'Image size must be less than 15 MB')}}</strong>
                                                        </span>
                            @endif
                            <input type="file" id="pic" name="pic" class="form-control{{ $errors->has('pic') ? ' is-invalid' : '' }}" placeholder="Choose a event pic to upload" value="{{ $clubs->cover_photo }}" required/>
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
