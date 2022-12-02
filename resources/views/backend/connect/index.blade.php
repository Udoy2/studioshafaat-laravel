@extends('layouts.backend')


@section('content')
    {{-- style --}}

    {{-- content --}}
    <div class="container-fluid">
        <form action="" class="bg-dark rounded mb-4 py-5 mt-3" action="{{ route('admin.connect.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="m-auto row">

                <div class="form-group col-lg-6">
                    <label class="text-light mt-3">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control " value="{{ $connect->phone_number }}"
                        placeholder="Phone Number" />
                </div>
                <div class="form-group col-lg-6 ">
                    <label class="text-light mt-3">Email</label>
                    <input type="email" name="email" class="form-control " value="{{ $connect->email }}"
                        placeholder="Email" />
                </div>
                <div class="form-group col-lg-6 ">
                    <label class="text-light mt-3">Facebook Link</label>
                    <input type="text" name="facebook_link" class="form-control " value="{{ $connect->facebook_link }}"
                        placeholder="Facebook Link" />
                </div>
                <div class="form-group col-lg-6 ">
                    <label class="text-light mt-3">Instagram Link</label>
                    <input type="text" name="instagram_link" class="form-control " value="{{ $connect->instagram_link }}"
                        placeholder="Instagram Link" />
                </div>
                <div class="form-group col-lg-6 ">
                    <label class="text-light mt-3">Youtube Link</label>
                    <input type="text" name="youtube_link" class="form-control " value="{{ $connect->youtube_link }}"
                        placeholder="Youtube Link" />
                </div>
                <div class="form-group col-lg-6 ">
                    <label class="text-light mt-3">Whatsapp Link</label>
                    <input type="text" name="whatsapp_link" class="form-control " value="{{ $connect->whatsapp_link }}"
                        placeholder="Whatsapp Link" />
                </div>
                <div class="form-group col-lg-6 ">
                    <label class="text-light mt-3">Linkedin LInk</label>
                    <input type="text" name="linkedin_link" class="form-control " value="{{ $connect->linkedin_link }}"
                        placeholder="Linkedin Link" />
                </div>

                <div class="col-lg-12 mt-3">
                    <button type="submit" class="btn btn-primary ">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

    {{-- scripts --}}
@endsection
