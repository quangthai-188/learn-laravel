@extends('layouts.master')


@section('NoiDung')
 
@if ($khoahoc !="")
{{$khoahoc}}
    @else 
    {{"khong co khoa hoc"}}
@endif

 <br>

@for($i=0; $i<=10; $i++)
{{$i." "}}
@endfor

<?php 
 $khoahoc= array("Laravel","PHP");
 ?>

{{-- @if (!empty($khoahoc))
    @foreach($khoahoc as $value)
    {{$value}}
    @endforeach
@else
    {{"Mang rong"}}
@endif --}}

@forelse ($khoahoc as $value)
    {{-- @continue($value=="Laravel") --}}
    @break($value=="PHP")
    {{$value}}
@empty
    {{"Mang rong"}}
@endforelse



@endsection