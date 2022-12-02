@extends('layouts.backend')

@section('content')
    {{-- styles --}}

    {{-- content --}}
    <div class="container-fluid">
        <form action="{{ route('admin.collectibles.store') }}" class="bg-dark rounded mb-4 py-5 mt-3" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="m-auto row">
                <div class="form-group col-lg-4">
                    <label class="text-light mt-1">Title</label>
                    <input type="title" class="form-control" name="title" id="title" placeholder="Your Title"
                        value="{{ old('title') }}" />
                </div>
                <div class="form-group col-lg-4">
                    <label class="text-light mt-1">Measurement</label>
                    <input type="text" class="form-control" name="measurement" placeholder="Measurement"
                        value="{{ old('measurement') }}" />
                </div>
                <div class="form-group col-lg-4">
                    <label class="text-light mt-1">Medium</label>
                    <input type="text" class="form-control" name="medium" placeholder="Medium"
                        value="{{ old('medium') }}" />
                </div>
                <div class="form-group col-lg-4">
                    <label class="text-light mt-1">Client</label>
                    <input type="text" class="form-control" name="client" placeholder="Client"
                        value="{{ old('client') }}" />
                </div>
                <div class="form-group col-lg-4">
                    <label class="text-light mt-1">Client Link</label>
                    <input type="text" class="form-control" name="client_link" placeholder="Client Link"
                        value="{{ old('client_link') }}" />
                </div>
                <div class="form-group col-lg-4">
                    <label class="text-light mt-1">Year</label>
                    <input type="text" class="form-control" name="year" placeholder="year" value="{{ old('year') }}" />
                </div>
                <div class="form-group col-lg-12">
                    <label class="text-light mt-1">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="10"
                        placeholder="Description">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <div class="form-check col-lg-12 mt-3">
                        <input type="checkbox" style="cursor: pointer" id="select_youtube_video" class="form-check-input"
                            name="gallery_type" value="youtube_video" />
                        <label class="form-check-label text-light" for="select_youtube_video">
                            Youtube Video
                        </label>
                    </div>
                </div>


                <div class="form-group col-lg-6" id="image_upload_section">
                    <input type="file" class="form-control mt-3" name="gallery_image" id="image" />
                </div>
                <div class="form-group col-lg-6" id="youtube_link" style="display: none">
                    <input type="text" name="youtube_link" id="" class="form-control mt-3" placeholder="Youtube Link" />
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
        <form action="{{ route('admin.collectibles.store_collectible') }}" class="bg-dark rounded mb-4 py-5 mt-3"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="m-auto row">



                <div class="form-group col-lg-12">
                    <label class="text-light mt-3">Collectible banner</label>
                    <input type="file" class="form-control" name="collectible_image" id="image" />
                </div>

                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary mt-3">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if (count($collectiblesgallerys) > 0)
        <div class="container-fluid ">
            <table class="table " style="overflow-x: scroll">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Gallery Thumbnail</th>
                        <th scope="col">Title</th>
                        <th scope="col">Gallery Type</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collectiblesgallerys as $collectiblesgallery)
                        <tr>
                            @if ($collectiblesgallery->gallery_type == 'youtube_video')
                                <th scope="row"><img height="45px" width="80px"
                                        src="{{ $collectiblesgallery->gallery_youtube_thumbnail }}" alt="" srcset="">
                                </th>
                            @else
                                <th scope="row"><img height="45px" width="80px"
                                        src="{{ $collectiblesgallery->gallery_thumbnail_image }}" alt="" srcset=""></th>
                            @endif
                            <td>{{ $collectiblesgallery->title }}</td>
                            <td>
                                @if ($collectiblesgallery->gallery_type == 'youtube_video')
                                    <span class="badge badge-danger">Youtube</span>
                                @else

                                    <span class="badge badge-warning">Image</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.collectibles.edit', $collectiblesgallery->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('admin.collectibles.destroy', $collectiblesgallery->id) }}"
                                    class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            <div class="w-100  d-flex flex-row-reverse mb-5">
                <div class="ml-2">
                    {{ $collectiblesgallerys->links() }}
                </div>
            </div>
        </div>
    @endif
    {{-- scripts --}}
    <script src="{{ asset('backend/js/backendCollectibles.js') }}">

    </script>
@endsection
