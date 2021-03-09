@extends('parent-view')


@section('content')
@parent
    with out  @/parent it will override parent content section

    @include('child-include',['name'=>'shabair'])
    <!-- dont use include of php -->
@endsection



@push('css')

<style>
body{
    background:#66aacc;
    color:#fff;
}
</style>

@endpush