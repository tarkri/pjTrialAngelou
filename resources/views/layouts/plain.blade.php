@yield('content')


<script src="https://code.jquery.com/jquery-3.1.0.min.js"
        integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
{{--<script>window.jQuery || document.write('<script src="{{ URL::asset('library/js/jquery-3.1.0.slim.min.js') }}"><\/script>')</script>--}}
<script src="{{ URL::asset('library/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('library/js/app.js') }}"></script>
@yield('scripts')
