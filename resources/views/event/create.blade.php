@extends('layouts.app')

@section('content')

    <div class="col-md-10 m-auto">

        <div class="card sm-hidden">

            <div class="card-header"><h4>{{ __('Add a Event') }}</h4></div>

            <div class="card-body">
                <form method="post" action="{{ route('event.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input type="text" name="name"  class="form-control d-flex ml-auto mr-auto {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Enter the event name" value="{{ old('name') }}" required>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="club_id" class="col-md-4 col-form-label text-md-right">{{ __('Club') }}</label>

                        <div class="col-md-6">
                            <select name="club_id" class="custom-select" id="club_id" required>
                                <option value="" selected="">Choose One</option>
                                @foreach($clubs as $club)
                                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

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
                        <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                        <div class="col-sm-6">
                            <input id="date" type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" placeholder="Enter the event date" value="{{ old('date') }}" required autofocus>

                            @if ($errors->has('date'))
                                <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('date' , 'Entered date is invalid') }}</strong>
                                                        </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="opening" class="col-md-4 col-form-label text-md-right">{{ __('Opening Time') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="opening" class="form-control" name="opening" placeholder="Enter the event opening time" value="{{ old('opening') }}" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="closing" class="col-md-4 col-form-label text-md-right">{{ __('Closing Time') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="closing" class="form-control" name="closing" placeholder="Enter the event closing time" value="{{ old('closing') }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right" >{{ __('Description') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="description" class="form-control" name="description" placeholder="Write something about the event" value="{{ old('description') }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right" >{{ __('Price') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="price" class="form-control" name="price" placeholder="Enter the event ticket price" value="{{ old('price') }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ticket" class="col-md-4 col-form-label text-md-right" >{{ __('Ticket Link') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="ticket" class="form-control" name="ticket" placeholder="Enter the event ticket link ( not mandatory )" value="{{ old('ticket_link') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="facebook" class="col-md-4 col-form-label text-md-right" >{{ __('Facebook') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="facebook" class="form-control" name="facebook" placeholder="Enter the event facebook link ( not mandatory )" value="{{ old('facebook') }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="instagram" class="col-md-4 col-form-label text-md-right">{{ __('Instagram') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="instagram" class="form-control" name="instagram" placeholder="Enter the event instagram link ( not mandatory )" value="{{ old('instagram') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pic" class="col-md-4 col-form-label text-md-right" >{{ __('Upload a pic') }}</label>

                        <div class="col-md-6">
                            <input type="file" id="pic" name="pic" class="form-control{{ $errors->has('pic') ? ' is-invalid' : '' }}" placeholder="Choose a event pic to upload" value="{{ old('pic') }}" required/>
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
