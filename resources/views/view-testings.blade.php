@extends('layout.master')
{{--we can also use layout/master instead layout.master--}}

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


@{{ $html }}
<!-- if we dont use blade templateand output ( {{ $html }} )-->

{{$html or "Var is not set"}}
<!-- instead of isset($html)? $html:"Var is not set" -->


<?php $var = 4;?>
@if( $var == 2 )
    <h4>var is equal 2</h4>
@elseif( $var == 4 )
    <h4>var is equal 4</h4>
@else
    <h4>var is equal to other value</h4>
@endif

<!-- instead of if( ! false ) its opposite to if both will work-->
@unless(false)
<h4>True</h4>
@endif


<!-- loop in blade -->
@for($i = 1; $i<=5; $i++)
    <h4>value is: {{$i}}</h4>
@endfor

<!-- loop in blade -->
<?php $i = 1;?>
@while( $i<=5 )
    <h4>value is: {{$i}} in the while</h4>
    @if($i == 3)
    @break
    @endif
    <?php $i++;?>
@endwhile

@if (isset($anArray))
    @foreach($anArray as $item)
        {{$item->name}}
    @endforeach
@else
    <h4>There is no Data</h4>
@endif

<!--instead of above example  -->
@php 

    $name = "Shabair";
@endphp



@endsection

{{--right now forelse is not working check in future--}}
{{-- this is the comment in php--}}
{{-- //or use @stop instead of @section --}}


@push('css')

<style>
body{
    background:#000;
    color:#fff;
}
</style>

@endpush