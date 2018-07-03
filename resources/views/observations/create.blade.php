@extends('layouts.observation')

@section('observationblock')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{ url('/observation') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <!-- Observation Specie Selection-->
            <div class="form-group">
                <label for="specie_id" class="col-sm-3 control-label">Select Specie: </label>
                <div class="col-sm-6">
                    <select class="form-control" name="specie_id">
                        @foreach($species as $specie)
                        <option value="{{ $specie->id }}">{{ $specie->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- User Observation Input -->
            <div class="form-group">
                <label for="observation" class="col-sm-3 control-label">Your Observation</label>

                <div class="col-sm-6">
                    <textarea name="observation" id="observation" class="form-control"></textarea>
                </div>
            </div>

            <!--  GPS Coordinate Input -->
            <div class="form-group">
                <label for="gps_coord1" class="col-sm-3 control-label">GPS Coordinate 1: </label>

                <div class="col-sm-6">
                    <input type="text" name="gps_coord1" id="gps_coord1" class="form-control">
                </div>
            </div>

            <!--  GPS Coordinate Input -->
            <div class="form-group">
                <label for="gps_coord2" class="col-sm-3 control-label">GPS Coordinate 2: </label>

                <div class="col-sm-6">
                    <input type="text" name="gps_coord2" id="gps_coord1" class="form-control">
                </div>
            </div>

            <!-- Add Observation Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Observation
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection