@extends('layouts.main')
@section('content')
@livewire('main.manage-user-permission', ['user' => $user])
@endsection