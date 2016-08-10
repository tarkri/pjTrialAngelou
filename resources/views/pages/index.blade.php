@extends('layouts.master')

@section('content')

        <div class="container">
                <button class="btn btn-primary btn-lg create-entry">Create Journal Entry</button>
                <div class="form-wrapper">
                        <div class="row">
                                <div class="col-md-8 col-md-offset-2 situation"></div>
                                <div class="col-md-8 col-md-offset-2 results"></div>
                                <div class="col-md-8 col-md-offset-2">
                                        <div class="col-md-6 thoughts"></div>
                                        <div class="col-md-6 behavior"></div>
                                        <div class="col-md-6 inner-state"></div>
                                        <div class="col-md-6 mindset"></div>
                                </div>
                                <div class="col-md-8 col-md-offset-2 insights"></div>
                                <div class="col-md-8 col-md-offset-2 outcome"></div>
                                <div class="col-md-8 col-md-offset-2 contemplation"></div>
                                <div class="col-md-8 col-md-offset-2 action"></div>
                        </div>
                </div>
        </div>

@stop

@section('scripts')
        <script>
                beginJournal("{{ URL::to('create') }}", "{{ csrf_token() }}");
        </script>
@stop