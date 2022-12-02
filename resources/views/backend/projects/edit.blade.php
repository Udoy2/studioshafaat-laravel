@extends('layouts.backend')


@section('content')
    {{-- css links --}}

    {{-- content --}}
    <div class="container-fluid ">
        <form class="bg-dark rounded  mb-4 py-5 mt-3" enctype="multipart/form-data"
            action="{{ route('admin.projects.update', $projectgallerys->id) }}" method="POST">
            @csrf
            <div class="m-auto row">
                <div class="form-group col-lg-4">
                    <label class="text-light mt-1">Title</label>
                    <input type="title" class="form-control" name="title" id="title" placeholder="Your Title"
                        value="{{ $projectgallerys->title }}" />
                </div>
                <div class="form-group col-lg-4">
                    <label class="text-light mt-1">Measurement</label>
                    <input type="text" class="form-control" name="measurement" placeholder="Measurement"
                        value="{{ $projectgallerys->measurement }}" />
                </div>
                <div class="form-group col-lg-4">
                    <label class="text-light mt-1">Medium</label>
                    <input type="text" class="form-control" name="medium" placeholder="Medium"
                        value="{{ $projectgallerys->medium }}" />
                </div>
                <div class="form-group col-lg-4">
                    <label class="text-light mt-1">Client</label>
                    <input type="text" class="form-control" name="client" placeholder="Client"
                        value="{{ $projectgallerys->client }}" />
                </div>
                <div class="form-group col-lg-4">
                    <label class="text-light mt-1">Client Link</label>
                    <input type="text" class="form-control" name="client_link" placeholder="Client Link"
                        value="{{ $projectgallerys->client_link }}" />
                </div>
                <div class="form-group col-lg-4">
                    <label class="text-light mt-1">Year</label>
                    <input type="text" class="form-control" name="year" placeholder="year"
                        value="{{ $projectgallerys->year }}" />
                </div>
                <div class="form-group col-lg-12">
                    <label class="text-light mt-1">Description</label>
                    <textarea name="description" id="description" class="form-control " rows="10"
                        placeholder="Description">{{ $projectgallerys->description }}</textarea>
                </div>
                <div class="form-group">
                    <div class="form-check col-lg-12 mt-3">

                        @if ($projectgallerys->gallery_type == 'youtube_video')
                            <input checked type="checkbox" style="cursor: pointer" id="select_youtube_video"
                                class="form-check-input" name="gallery_type" value="youtube_video" />
                        @else

                            <input type="checkbox" style="cursor: pointer" id="select_youtube_video"
                                class="form-check-input" name="gallery_type" value="youtube_video" />
                        @endif
                        <label class="form-check-label text-light" for="select_youtube_video">
                            Youtube Video
                        </label>
                    </div>
                </div>
                <div class="form-group col-lg-6">
                    <select name="project" id="project" class="form-control mt-3">
                        @foreach ($projects as $project)
                            @if ($project->id == $projectgallerys->project_id)
                                <option selected value="{{ $project->id }}">{{ $project->project_name }}</option>

                            @endif
                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-lg-6" id="image_upload_section">
                    <input type="file" class="form-control mt-3" name="gallery_image" id="image" />
                </div>
                <div class="form-group col-lg-6" id="youtube_link" style="display: none">
                    <input type="text" name="youtube_link" value="{{ $projectgallerys->gallery_youtube_link }}" id=""
                        class="form-control mt-3" placeholder="Youtube Link" />
                </div>
                <div class="form-group col-lg-6" id="youtube_thumbnail_image" style="display: none">
                    <input type="file" class="form-control mt-3" name="youtube_thumbnail_image"
                        id="youtube_thumbnail_image" />
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary mt-3">
                        Submit
                    </button>
                </div>
            </div>
        </form>

    </div>

    {{-- scripts --}}
    <script src="{{ asset('backend/js/backendProjects.js') }}"></script>

@endsection
