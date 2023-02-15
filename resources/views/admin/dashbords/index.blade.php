@extends('layout.app')
@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p>c'est la partie administrations de demande d'attestation et de laisser passé </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route("dashbord.index")}}">Dashboard</a></li>
        </ul>
    </div>
    @if(Auth::user()->hasRole('Admin'))
        @include('admin.dashbords.includes.__admin',['count_demande'=>$count_demande])
    @else
        @include('admin.dashbords.includes.__admin')
    @endif
</main>

@endsection
