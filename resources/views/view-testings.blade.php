@extends('layout.master')

@section('content')
<h1>In the Testing</h1>
<!-- instead of <?=$content?> we use-->
<p>{{$content}}</p>
<!-- it also escape html means convert html to text -->
<!-- lets do some tests -->
<?php $html = "<h2>This is the HTML</h2>"?>

<?=$html?>
<!-- output with html result ( This is the HTML )-->


{{$html}}
<!-- output with escaped html result ( <h2>This is the HTML</h2> )-->


{!! $html !!}
<!-- output with html result ( This is the HTML )-->
@endsection
<?php //or use @stop instead of @section ?>