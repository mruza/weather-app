@extends('layout')

@section('content')

    <div class="col-sm-8">
        <h2>Measurements</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>City</th>
                <th>Temperature</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($measurements as $measurement)
                <tr>
                    <td>{{$measurement->id}}</td>
                    <td>{{$measurement->city}}</td>
                    <td>{{$measurement->temp}} &#8451;</td>
                    <td>{{$measurement->created_at->format('d.m.Y - H:m')}} </td>
                    <td>{{$measurement->updated_at->format('d.m.Y - H:m')}} </td>
                    <td>
                        <a href="{{route('weather.show', $measurement->id)}}" class="btn btn-secondary active" role="button" aria-pressed="true">Show</a>
                        <a href="{{route('weather.edit', $measurement->id)}}" class="btn btn-primary active" role="button" aria-pressed="true">Edit</a>
                        <form action="{{ route('weather.delete', $measurement->id)}}" method="post" style="display: inline">
                            @method('DELETE')
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
