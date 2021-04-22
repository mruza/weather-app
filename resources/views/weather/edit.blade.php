@extends('layout')

@section('content')

    <div class="col-sm-8">
        <h2>Edit measurement</h2>
        <form action="{{ route('weather.update', $measurement->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-auto">

                    <label for="city" class="form-label">City:</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{$measurement->city}}">
                </div>
                <div class="col-auto">

                    <label for="temp" class="form-label">Temperature:</label>
                    <input type="text" class="form-control" id="temp" name="temp" value="{{$measurement->temp}}">
                </div>
            </div>
            <div class="row">
                <div class="col-auto mt-1">
                    <button type="submit" class="btn btn-primary mb-3">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
