@extends('layouts.backend')


@section('content')
    {{-- styles --}}

    {{-- content --}}
    <div class="container-fluid">
        <form action="{{ route('admin.user.store') }}" class="bg-dark rounded mb-4 py-5 mt-3" method="POST">
            @csrf
            <div class="m-auto row">



                <div class="form-group col-lg-12">
                    <label class="text-light mt-3">User Password</label>
                    <input type="password" class="form-control" name="password" id="image" />
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
