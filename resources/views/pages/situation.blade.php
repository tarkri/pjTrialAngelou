@extends('layouts.plain')

@section('content')
    <div class="card text-center" style="width:100%">
        <h2>The Situation</h2>
        <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">
        <input type="hidden" name="situation" id="situation" value="{{ $situation->id }}">
        <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
        <button type="submit" class="btn btn-default situation">Submit</button>
    </div>
@stop