@extends('home')

@section('content')

    <div class="col-md-10 m-auto">

        <div class="card sm-hidden">

            <div class="card-header"><h4>{{ __('Add Pictures to a club Gallery') }}</h4></div>

            <div class="card-body">
                <form method="post" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="club_id" class="col-md-4 col-form-label text-md-right">{{ __('Club') }}</label>

                        <div class="col-md-6">
                            <select name="club_id" class="custom-select" id="club_id">
                                <option value="" selected="">Choose One</option>
                                @foreach($clubs as $club)
                                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pic" class="col-md-4 col-form-label text-md-right">{{ __('Upload a pic') }}</label>

                        <div class="col-md-6">
                            <input type="file" id="pic" name="pic" class="form-control" required/>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-sm-7">
                            <input type="text" id="description" class="form-control" name="description">
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
