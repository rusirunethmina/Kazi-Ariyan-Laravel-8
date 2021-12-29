@php
      $sliders = DB::table('sliders')->get();
@endphp

<div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

    <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        @foreach ($sliders as $key => $data)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="background-image: url({{ $data->image }});">
            <div class="carousel-container">
                <div class="carousel-content animate__animated animate__fadeInUp">
                    <h2><span>{{ $data->title }}</span></h2>
                    <p>{{ $data->descripition }}</p>
                    <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

</div>
