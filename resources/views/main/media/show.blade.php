@extends('layouts.main')

@section('content')
@livewire('main.media-show',['projectId'=>$projectId])
@endsection