@extends('layouts.frontend')

@section('content')
    {{-- styles --}}
    <link rel="stylesheet" href="{{ asset('/frontend/css_min/nutshell.min.css') }}" />


    {{-- content --}}
    <main class="main container nutshell_wrapper">

        <div class="nutshell_container">
            <div class="nutshell_container_content">
                <h1 class="nutshel_heading">In A Nutshell</h1>
                <p class="details">
                    {{ $nutshell->description }}
                </p>
                <div class="resume">
                    <a href="{{ asset($nutshell->resume) }}" target="_blank" class="btn btn_secondary">Resume</a>
                </div>
            </div>
        </div>
        <div class="body_footer">
          <p>
            <span>&copy;</span>
            Studio Shafaat 2021 | Developed by <span> </span>
            <a
              href="https://www.facebook.com/udoyrahman980"
              class="text_hover"
              target="_blank"
              rel="Developer"
            >
              Udoy Rahman</a
            >
          </p>
        </div>

    </main>

    {{-- scripts --}}
    <script src="{{ asset('/frontend/js/nutshell.js') }}"></script>

@endsection
