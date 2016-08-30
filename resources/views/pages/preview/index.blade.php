@extends('layouts.master')

@section('content')


    <div class="container">
        <div class="form-wrapper">
            <div class="row">
                <div class="form-content hidden"></div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $.get("{{ $url }}", function(response){
            $('.form-content').html(response);
            $('.form-content').toggleClass('hidden animated flipInX');
        });
    </script>
@stop