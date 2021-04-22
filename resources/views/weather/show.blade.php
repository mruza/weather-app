@extends('layout')

@section('content')

   <div class="col-sm-8">
        <h2>Show measurement </h2>
        <ul class="list-group">
            <li class="list-group-item"><strong>ID:</strong> {{$measurement->id}}</li>
            <li class="list-group-item"><strong>City:</strong> {{$measurement->city}}</li>
            <li class="list-group-item"><strong>Temperature:</strong> {{$measurement->temp}}  &#8451;</li>
            <li class="list-group-item"><strong>CreatedAt:</strong> {{$measurement->created_at}}</li>
            <li class="list-group-item"><strong>UpdatedAt:</strong> {{$measurement->updated_at}}</li>
        </ul>
        <a href="{{route('weather.index')}}" class="btn btn-outline-secondary active mt-5" role="button" aria-pressed="true">Back</a>
        <a href="{{route('weather.edit', $measurement->id)}}" class="btn btn-primary active mt-5" role="button" aria-pressed="true">Edit</a>

        <table class="table table-striped mt-5">
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
            @foreach($measurementsByCity as $measurementByCity)
                <tr>
                    <td>{{$measurementByCity->id}}</td>
                    <td>{{$measurementByCity->city}}</td>
                    <td>{{$measurementByCity->temp}} &#8451;</td>
                    <td>{{$measurementByCity->created_at->format('d.m.Y - H:m')}} </td>
                    <td>{{$measurementByCity->updated_at->format('d.m.Y - H:m')}} </td>
                    <td>
                        <a href="{{route('weather.show', $measurementByCity->id)}}" class="btn btn-secondary active" role="button" aria-pressed="true">Show</a>
                        <a href="{{route('weather.edit', $measurementByCity->id)}}" class="btn btn-primary active" role="button" aria-pressed="true">Edit</a>
                        <form action="{{ route('weather.delete', $measurementByCity->id)}}" method="post" style="display: inline">
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
