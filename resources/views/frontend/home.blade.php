@extends('layouts.frontend')

@section('content')
    {{-- page style --}}
    <link rel="stylesheet" href="{{ asset('/frontend/css_min/home.min.css') }}" />

    {{-- content --}}
    <main class="main container">

        <div class="home_container">
            <div class="content_overlay_sm_device"></div>
            <div class="home_container_content">
                <h1 class="first_name">SHAFAAT</h1>
                <h1 class="last_name">KHAN</h1>
                <p class="informations">VISUALIZER | UI/UX DESIGNER | THEATRE PERFORMER</p>
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
            </div>
            <div class="home_container_image">
                <img src="{{ asset('/frontend/assets/images/Shafaat Khan.png') }}" alt="Shafaat Khan" />
            </div>
        </div>
    </main>
@endsection
