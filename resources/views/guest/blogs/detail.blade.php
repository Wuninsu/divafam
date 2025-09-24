@extends('layouts.app')
@section('content')
@livewire('guest.blog-detail',['post'=>$post])
@endsection