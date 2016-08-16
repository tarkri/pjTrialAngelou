@extends('layouts.master')

@section('content')

    <div class="container">
        <button class="btn btn-primary btn-lg hidden create-entry animated bounceIn">Create Journal Entry</button>
        <div class="form-wrapper">
            <div class="row">
                <div class="form-content hidden"></div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        beginJournal("{{ URL::to('create') }}", "{{ csrf_token() }}");
    </script>
@stop