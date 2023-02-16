@extends('layout.app')
@section('content')

<main class="app-content">
    @if(Auth::user()->hasRole('admin'))
        @include('admin.dashbords.includes.__admin',['count_demande' => $count_demande])
    @else
        @include('admin.dashbords.includes.__demandeur')
    @endif
</main>

@endsection
