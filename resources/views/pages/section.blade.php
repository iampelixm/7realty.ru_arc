@extends('layouts.site')

@section('content')
<h1 class="title text-center">{{$section_title ?? ''}}</h1>
    @foreach ($pages as $page)
        {{ $page }}
        <hr>
    @endforeach

@endsection
