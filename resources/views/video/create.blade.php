@extends('layouts.app')

@section('content')

    <div class="col-md-10 m-auto">

        <div class="card sm-hidden">

            <div class="card-header"><h4>{{ __('Add a Video') }}</h4></div>

            <div class="card-body">
                <form method="post" action="{{ route('video.store') }}" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group row">
                        <label for="event_id" class="col-md-4 col-form-label text-md-right">{{ __('Event') }}</label>

                        <div class="col-md-6">
                            <select name="event_id" class="custom-select" id="event_id" required>
                                <option value="" selected="">Choose One</option>
                                @foreach($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pic" class="col-md-4 col-form-label text-md-right" >{{ __('Upload a video') }}</label>

                        <div class="col-md-6">
                            <input type="file" id="pic" name="pic" class="form-control{{ $errors->has('pic') ? ' is-invalid' : '' }}" placeholder="Choose a event pic to upload" required/>
                            @if ($errors->has('pic'))
                                @foreach($errors->all() as $error)
                                <span class="invalid-feedback">
                                                            <strong>{{ $error }}</strong>
                                                        </span>
                                @endforeach
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
