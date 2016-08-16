@extends('layouts.journal')

@section('content')
    <div class="row">
        <div class="col-md-12" style="text-align: center;">
            <br>
            <h1>Performance Journal
                <br>
                <small>{{ date('F, jS Y \a\t g:ia', strtotime($journal->created_at)) }}</small>
            </h1>
            <hr>
        </div>
    </div>
    <div class="row journal-cards">
        <div class="col-md-4">
            <div class="card journal-card situation">
                <div class="card-header">
                    <h4 class="card-title" style="margin-bottom:0px;">Situation</h4>
                </div>
                <div class="card-block">
                    {{ $situation->content }}
                </div>
            </div>
            <hr>
            <div class="card journal-card results">
                <div class="card-header">
                    <h4 class="card-title" style="margin-bottom:0px;">Results</h4>
                </div>
                <div class="card-block">
                    {{ $result->content }}
                </div>
            </div>
            <hr>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="card journal-card thoughts">
                        <div class="card-header">
                            <h4 class="card-title" style="margin-bottom:0px;">My Thoughts</h4>
                        </div>
                        <div class="card-block">
                            {{ $thought->content }}
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="col-md-6">
                    <div class="card journal-card behavior">
                        <div class="card-header">
                            <h4 class="card-title" style="margin-bottom:0px;">My Behavior</h4>
                        </div>
                        <div class="card-block">
                            {{ $behavior->content }}
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6">
                    <div class="card journal-card inner-state">
                        <div class="card-header">
                            <h4 class="card-title" style="margin-bottom:0px;">My Inner State</h4>
                        </div>
                        <div class="card-block">
                            {{ $state->content }}
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="col-md-6">
                    <div class="card journal-card mindset">
                        <div class="card-header">
                            <h4 class="card-title" style="margin-bottom:0px;">My Mindset</h4>
                        </div>
                        <div class="card-block">
                            {{ $mindset->content }}
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="row journal-cards">
        <div class="col-md-4">
            <div class="card journal-card insights">
                <div class="card-header">
                    <h4 class="card-title" style="margin-bottom:0px;">Key Insights</h4>
                </div>
                <div class="card-block">
                    {{ $insight->content }}
                </div>
            </div>
            <hr>
        </div>
        <div class="col-md-4">
            <div class="card journal-card outcome">
                <div class="card-header">
                    <h4 class="card-title" style="margin-bottom:0px;">Desired Outcome</h4>
                </div>
                <div class="card-block">
                    {{ $outcome->content }}
                </div>
            </div>
            <hr>
        </div>
        <div class="col-md-4">
            <div class="card journal-card action">
                <div class="card-header">
                    <h4 class="card-title" style="margin-bottom:0px;">Action</h4>
                </div>
                <div class="card-block">
                    {{ $action->content }}
                </div>
            </div>
            <hr>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            var maxHeight = -1;

            $('.journal-card').each(function() {
                maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
            });

            $('.journal-card').each(function() {
                $(this).css('min-height', maxHeight);
            });
        });
    </script>
@stop