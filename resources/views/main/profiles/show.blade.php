@extends('layouts.main')

@section('content')
@livewire('main.profile-show',['userData'=>$userData])
@endsection