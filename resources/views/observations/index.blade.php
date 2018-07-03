@extends('layouts.observation')

@section('observationblock')

    <!-- Current Observations -->
    
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">List of Observations
                    <a href="{{ url('/observation/add') }}" class="btn btn-xs btn-info pull-right">
                    Add Observation
                    </a>
                </h3>
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>OBSERVATION</th>
                        <th>GPS COORDINATES</th>
                        <th>SPECIE</th>
                        <th>OBSERVER</th>
                        <th>POSTED ON</th>
                        <th>ACTION </th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($observations as $observation)
                            <tr>
                                <!-- Observation content -->
                                <td class="table-text">
                                    <div>{{ $observation->observation }}</div>
                                </td>
                                <!-- Observation GPS -->
                                <td class="table-text">
                                    <div>{{ $observation->gps_coord1 . ',' . $observation->gps_coord2 }}</div>
                                </td>

                                <!-- Observation specie  -->
                                <td class="table-text">
                                    <div>{{ $observation->specie->name }}</div>
                                </td>

                                <!-- Observer content -->
                                <td class="table-text">
                                    <div>{{ $observation->user->name }}</div>
                                </td>

                                <!-- observation date  -->
                                <td class="table-text">
                                    <div>{{ $observation->created_at }}</div>
                                </td>

                                <td>
                                    <!-- Edit button-->
                                    <a href="{{ url('/observation/'. $observation->id .'/edit') }}" class="btn btn-info">
                                        Edit
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ url('observation/'.$observation->id) }}" method="POST">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}

                                        <button class="btn-danger" >Delete </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection