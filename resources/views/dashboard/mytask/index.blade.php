@extends('layouts.master')


@section('content')
    <x-header-title title="My Task Page"></x-header-title>


    @livewire('task.mytask')

@endsection
