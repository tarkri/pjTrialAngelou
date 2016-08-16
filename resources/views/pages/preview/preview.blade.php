@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="form-wrapper">
            <div class="row">
                <div class="form-content">
                    <div class="card text-center" style="width:100%">
                        <form>
                            <h2>Situation</h2>
                            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="situation" id="situation" value="">
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10" placeholder="Describe what happened"></textarea>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        beginJournal("{{ URL::to('create') }}", "{{ csrf_token() }}");
    </script>
@stop