@extends('layouts.app')

@section('content')
<div class="container-fluid">
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('create property') }}</h1>
                    <a href="{{ route('admin.properties.index') }}" class="btn btn-success btn-sm shadow-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="agent">{{ __('agent') }}</label>
                        <select name="agent_id" class="form-control" id="agent_id">
                            @foreach ($agents as $agent)
                                    <option value="{{$agent->id}}">{{$agent->name}}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control" id="agent" placeholder="{{ __('agent') }}" name="agent" value="{{ old('agent') }}" />
                    </div>

                    <div class="form-group">
                        <label for="title">{{ __('title') }}</label>
                        <input type="text" class="form-control" id="title" placeholder="{{ __('title') }}" name="title" value="{{ old('title') }}" />
                    </div>
                    <div class="form-group">
                        <label for="location">{{ __('location') }}</label>
                        <input type="text" class="form-control" id="location" placeholder="{{ __('location') }}" name="location" value="{{ old('location') }}" />
                    </div>
                    <div class="form-group">
                        <label for="bed">{{ __('bed') }}</label>
                        <input type="number" class="form-control" id="bed" placeholder="{{ __('bed') }}" name="bed" value="{{ old('bed') }}" />
                    </div>
                    <div class="form-group">
                        <label for="bath">{{ __('bath') }}</label>
                        <input type="number" class="form-control" id="bath" placeholder="{{ __('bath') }}" name="bath" value="{{ old('bath') }}" />
                    </div>
                    <div class="form-group">
                        <label for="price">{{ __('price') }}</label>
                        <input type="number" class="form-control" id="price" placeholder="{{ __('price') }}" name="price" value="{{ old('price') }}" />
                    </div>
                    <div class="form-group">
                        <label for="banner">{{ __('banner') }}</label>
                        <input type="file" class="form-control" id="banner" placeholder="{{ __('banner') }}" name="banner" value="{{ old('banner') }}" />
                    </div>
                   
                    <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection

@push('style-alt')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('script-alt')
<script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"
    >
    </script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
      $('.select-multiple').select2();
</script>
@endpush