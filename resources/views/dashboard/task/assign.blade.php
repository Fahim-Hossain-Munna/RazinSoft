@extends('layouts.master')


@section('content')

<x-header-title title="Assign Task To Employee"></x-header-title>

@livewire('task.taskassign',['task' => $task])


@endsection
