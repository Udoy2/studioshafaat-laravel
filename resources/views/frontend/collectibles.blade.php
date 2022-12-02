@extends('layouts.frontend')


@section('content')
    {{-- styles --}}
    <link rel="stylesheet" href="{{ asset('/frontend/assets/packages/lightslider-master/dist/css/lightslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('/frontend/css_min/collectibles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/frontend/css_min/gallery.min.css') }}" />


    {{-- content --}}
    <main class="main container collectibles">
        <div class="collectibles_wrapper">
            
        <div class="collectibles_container">
            <div class="collectibles_gallery" style="
                                                                            background-image: linear-gradient(
                                                                                90deg,
                                                                                rgba(0, 0, 0, 0.12) 0%,
                                                                                rgba(0, 0, 0, 0.12) 100%
                                                                              ),
                                                                              url({{ asset($collectibles->collectibles_image) }});
                                                                          ">
                <button class="collectibles_gallery_button collectibles_gallery_open">
                    Enter Gallery
                    <div class="arrow_right">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8-8-8z" />
                        </svg>
                    </div>
                </button>
            </div>
        </div>
        <!-- under image div button -->
        <button class="collectibles_gallery_button_bottom collectibles_gallery_open">
            Enter Gallery
            <div class="arrow_right">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8-8-8z" />
                </svg>
            </div>
        </button>
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

        <!-- gallery section -->
        <section class="gallery" id="gallery">
            <div class="gallery_wraper">
                <div class="gallery_container">
                    <div class="slider_gallery">
                        <div class="slider_gallery_main_image" id="gallery_main_image">
                            {{-- main image --}}
                        </div>
                        <div class="gallery_content">
                            <h1 class="gallery_content_title" id="gallery-title"></h1>
                            <div class="gallery_content_description">
                                <p>Description: <span id="gallery-description"></span></p>
                                <p>Measurement: <span id="gallery-measurement">25 x60</span></p>
                                <p>Medium: <span id="gallery-medium">Digital</span></p>
                                <p>Client: <span id="client_link_placeholder"></span></p>
                                <p>Year: <span id="gallery-year">2011</span></p>
                            </div>
                            <div class="gallery_content_footer">

                            </div>
                        </div>
                    </div>
                    <div class="slider_gallery_slider" id="gallery_thumbnail_container">
                        {{-- gallery thumbnails --}}

                    </div>
                </div>
                <div class="gallery_navigation">
                    <button class="gallery_navigation_icon gallery_navigation_counter" id="gallery_navigation_counter">

                    </button>
                    <button class="gallery_navigation_icon" id="gallery_share">
                        <svg xmlns="http://www.w3.org/2000/svg" class="navigation_icon" viewBox="0 0 24 24" fill="#000000">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z" />
                        </svg>
                    </button>
                    <button class="gallery_navigation_icon" id="fullscreen_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="navigation_icon" viewBox="0 0 24 24" fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z" />
                        </svg>
                    </button>
                    <button class="gallery_navigation_icon" id="gallery_zoom_in">
                        <svg xmlns="http://www.w3.org/2000/svg" class="navigation_icon" viewBox="0 0 24 24" fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14zm.5-7H9v2H7v1h2v2h1v-2h2V9h-2z" />
                        </svg>
                    </button>
                    <button class="gallery_navigation_icon" id="gallery_zoom_out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="navigation_icon" viewBox="0 0 24 24" fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14zM7 9h5v1H7z" />
                        </svg>
                    </button>
                    <button class="gallery_navigation_icon" id="gallery_icon_cross">
                        <svg xmlns="http://www.w3.org/2000/svg" class="navigation_icon" viewBox="0 0 24 24" fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" />
                        </svg>
                    </button>
                </div>
                <div class="share_container" id="share_container">
                    <div class="share_wrapper">
                        <div class="share_links">
                            <div class="text_hover" id="gallery_share_facebook">
                                <i class="fab fa-facebook share_links_icon"></i>
                            </div>
                            <div class="text_hover" id="gallery_share_whatsapp">
                                <i class="fab fa-whatsapp share_links_icon"></i>
                            </div>
                            <div class="text_hover" id="gallery_share_linkendin">
                                <i class="fab fa-linkedin share_links_icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>



    {{-- scripts --}}
    <script src="{{ asset('/frontend/assets/packages/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/packages/lightslider-master/dist/js/lightslider.js') }}"></script>
    <script src="{{ asset('/frontend/js/collectibles.js') }}"></script>
    <script src="{{ asset('/frontend/js/gallery.js') }}"></script>
@endsection
