@extends('layouts.plain')

@section('content')
    <div class="card text-center" style="width:100%">
        <div class="row">
            <form>
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                <div class="col-md-6">
                    <div class="card journal-entry text-center" style="width:100%">
                        <h2>My Thoughts</h2>
                        <input type="hidden" name="thought_id" id="thought_id" value="{{ $thought->id }}">
                        <textarea name="thought_content" id="thought_content" class="form-control" cols="30"
                                  rows="10" placeholder="What I was thinking..."></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card journal-entry text-center" style="width:100%">
                        <h2>My Behavior</h2>
                        <input type="hidden" name="behavior_id" id="behavior_id" value="{{ $behavior->id }}">
                        <textarea name="behavior_content" id="behavior_content" class="form-control" cols="30"
                                  rows="10" placeholder="What I did and said..."></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card journal-entry text-center" style="width:100%">
                        <h2>My Inner State</h2>
                        <input type="hidden" name="innerState_id" id="innerState_id" value="{{ $innerState->id }}">
                        <textarea name="innerState_content" id="innerState_content" class="form-control" cols="30"
                                  rows="10" placeholder="What I was feeling..."></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card journal-entry text-center" style="width:100%">
                        <h2>My Mindset</h2>
                        <input type="hidden" name="mindset_id" id="mindset_id" value="{{ $mindset->id }}">
                        <textarea name="mindset_content" id="mindset_content" class="form-control" cols="30"
                                  rows="10" placeholder="What Drama Triangle or Empowerment Dynamic mode..."></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        postSubmission($('.card form'), "{{ URL::to($journal->id.'/reflection') }}", "{{ URL::to('/') }}");
    </script>
@stop