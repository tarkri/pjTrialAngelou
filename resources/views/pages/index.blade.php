@extends('layouts.master')

@section('content')

    <div class="container">
        <button class="btn btn-primary btn-lg create-entry">Create Journal Entry</button>
        <div class="form-wrapper">
            <div class="row">
                <div class="form-content"></div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        beginJournal("{{ URL::to('create') }}", "{{ csrf_token() }}");
    </script>
@stop