@extends('layouts.main')
@section('content')
@livewire('main.user-form', ['user' => $user])
@endsection