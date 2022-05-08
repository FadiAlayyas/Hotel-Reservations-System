
@extends('layouts.app')

@section('content')



<div class="card mb-3">
    <img src="{{URL::asset($service->image)}}" class="card-img-top" width="50" height="500" />
    <div class="card-body">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ $service->type }}</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {{ $service->description }}
            </div>
        </div>
      <p class="card-text"><small class="text-muted"> {{ $service->created_at}}</small></p>
    </div>
  </div>

@endsection
