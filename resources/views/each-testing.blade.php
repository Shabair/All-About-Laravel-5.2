@extends('layout.master')

@section('content')
<h1>All Names</h1>
<!-- run a loop with check point if there is data then fatch a single value and print in
print-all-names -->

@each('print-all-names',$names,'D','no-names')


@endsection

<!-- if $names array is empty then no-names view hitted -->
{{--it save the time and code of checking if it has data or not--}}


@push('css')
<link rel="stylesheet" href="style.css">
<style>
body{
    background:#66aacc;
    color:#fff;
}
</style>

@endpush

@push('js')
<script src="javascript.js"></script>
@endpush