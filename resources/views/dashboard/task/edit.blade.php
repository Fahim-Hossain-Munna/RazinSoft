@extends('layouts.master')

@section('content')

<x-header-title title="Task Edit Page"></x-header-title>

@livewire('task.taskedit',['task' => $task])

@endsection
