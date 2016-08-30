@extends('layouts.master')

@section('content')

    <div class="container">
        <button class="btn btn-primary btn-lg hidden create-entry animated bounceIn">Create Journal Entry</button>
        <div class="form-wrapper">
            <div class="row">
                <div class="form-content hidden"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <br><br>
        <h5>Past Journal Entries</h5>
        <div class="list-group">
            @foreach(App\Journal::orderby('created_at', 'desc')->get() as $journal)
                <div class="list-group-item">
                    <h5 class="list-group-item-heading">{{ date('F jS, Y \a\t g:ia', strtotime($journal->created_at)) }}</h5>
                    <div class="list-group-item-text">
                        <small>
                            {!! \App\Situation::where('journal_id', $journal->id)->first() ? '<span class="tag tag-warning">sitch</span> '.substr(\App\Situation::where('journal_id', $journal->id)->first()->content, 0, 35).'&hellip;' : null !!}
                            {!! \App\Action::where('journal_id', $journal->id)->first() ? '<br/><span class="tag tag-success">sitch</span> '.substr(\App\Action::where('journal_id', $journal->id)->first()->content, 0, 35).'&hellip;' : null !!}
                        </small>
                        <br><br>
                        <a href="{{ URL::to($journal->id.'/journal') }}" class="btn btn-secondary btn-sm">View</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@stop

@section('scripts')
    <script>
        beginJournal("{{ URL::to('create') }}", "{{ csrf_token() }}");
    </script>
@stop