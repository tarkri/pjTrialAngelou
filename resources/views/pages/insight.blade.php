@extends('layouts.plain')

@section('content')
    <div class="card text-center" style="width:100%">
        <form>
            <h2>Key Insights</h2>
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="insight" id="insight" value="{{ $insight->id }}">
            <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
@stop

@section('scripts')
    <script>
        postSubmission($('.card form'),"{{ URL::to($journal->id.'/insight') }}");
    </script>
@stop