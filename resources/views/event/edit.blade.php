@extends('layouts.app')

@section('content')

    <div class="col-md-10 m-auto">

        <div class="card sm-hidden">

            <div class="card-header"><h4>{{ __('Edit a Event') }}</h4></div>

            <div class="card-body">
                <form method="post" action="{{ route('event.update' , ['id' => $events->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input type="text" name="name"  class="form-control d-flex ml-auto mr-auto {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"  value="{{ $events->name }}" required/>

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
                                    <option value="{{ $club->id }}" @if($club->id == $events->club_id) selected="selected" @endif >{{ $club->name }}</option>
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
                                    <option value="{{ $category->id }}" @if($category->id == $events->category_id) selected="selected" @endif >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="odate" class="col-md-4 col-form-label text-md-right">{{ __('Opening Date') }}</label>

                        <div class="col-sm-6">
                            <input id="odate" type="date" class="form-control{{ $errors->has('odate') ? ' is-invalid' : '' }}" name="odate"  value="{{ $events->opening_date  }}" required autofocus>

                            @if ($errors->has('odate'))
                                <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('odate' , 'Entered date is invalid') }}</strong>
                                                        </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="opening" class="col-md-4 col-form-label text-md-right">{{ __('Opening Time') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="opening" class="form-control" name="opening"  value="{{ $events->opening }}" required/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cdate" class="col-md-4 col-form-label text-md-right">{{ __('Closing Date') }}</label>

                        <div class="col-sm-6">
                            <input id="cdate" type="date" class="form-control{{ $errors->has('cdate') ? ' is-invalid' : '' }}" name="cdate" value="{{ $events->closing_date }}" required autofocus>

                            @if ($errors->has('cdate'))
                                <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('cdate' , 'Entered date is invalid') }}</strong>
                                                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="closing" class="col-md-4 col-form-label text-md-right">{{ __('Closing Time') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="closing" class="form-control" name="closing"  value="{{ $events->closing }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right" >{{ __('Description') }}</label>

                        <div class="col-sm-7">
                            <textarea rows="5" cols="40" type="text" id="description" class="form-control" name="description" required autofocus>{{ $events->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right" >{{ __('Price') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="price" class="form-control" name="price"  value="{{ $events->price }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ticket" class="col-md-4 col-form-label text-md-right" >{{ __('Ticket Link') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="ticket" class="form-control" name="ticket"  value="{{ $events->ticket_link }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="facebook" class="col-md-4 col-form-label text-md-right" >{{ __('Facebook') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="facebook" class="form-control" name="facebook"  value="{{ $events->facebook }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="instagram" class="col-md-4 col-form-label text-md-right">{{ __('Instagram') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="instagram" class="form-control" name="instagram"  value="{{ $events->instagram }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pic" class="col-md-4 col-form-label text-md-right" >{{ __('Upload a pic') }}</label>

                        <div class="col-md-6">
                            @if($events->picture)
                                <img src="/images/{{ $events->picture }}" style="width:150px; height:150px;">
                            @else
                                <p>No image found</p>
                            @endif
                            @if ($errors->has('pic'))
                                <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('pic', 'Image size must be less than 15 MB')}}</strong>
                                                        </span>
                            @endif
                            <input type="file" id="pic" name="pic" class="form-control{{ $errors->has('pic') ? ' is-invalid' : '' }}" value="{{ $events->picture }}"  required/>
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
