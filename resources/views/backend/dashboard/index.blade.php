@extends('layouts.backend')


@section('content')
    {{-- styles --}}

    {{-- content --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">{{ $project_count }}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Projects</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">{{ $projectgallery_count }}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Gallery images of project</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">{{ $collectiblesgallery_count }}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Gallery images of collectible</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- scripts --}}
@endsection
