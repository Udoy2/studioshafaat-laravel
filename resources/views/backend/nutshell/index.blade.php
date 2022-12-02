@extends('layouts.backend')


@section('content')
    {{-- styles --}}

    {{-- content --}}
    <div class="container-fluid">

        <form action="" class="bg-dark rounded mb-4 py-5 mt-3" action="{{ route('admin.nutshell.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="m-auto row">

                <div class="form-group col-lg-12">
                    <label class="text-light mt-3">Nutshell Description</label>

                    <textarea name="description" id="description" class="form-control" rows="10"
                        placeholder="Description">{{ $nutshell->description }}</textarea>
                </div>


                <div class="form-group col-lg-12">
                    <label class="text-light mt-3">Resume File</label>

                    <input type="file" name="resume_file" class="form-control" />
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
@endsection
