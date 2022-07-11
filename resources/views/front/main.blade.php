@include("front.head")
@include('front.header', ['pages'=>$pages,'contacts'=>$contacts,'socials'=>$socials])
        <main class="main">
            <section class="intro-sections">
                <div class="intro-slider">
                    <div class="swiper js-intro-slider ">
                        <div class="swiper-wrapper">
                            @foreach($swipers as $swiper)
                            <div class="swiper-slide" style="background-image: url('{{$swiper['img_swiper']}}');"></div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="intro">
                        <div class="intro__wrap">
                            <div class="intro__title">
                                <h1 class="main-title">{{$main['title']}}</h1>
                            </div>
                            <span class="intro__text">{{$main['intro']}}</span>
                            <button type="button" class="btn  primary">{{$main['button_text']}}</button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        
        <div class="svg-sprite">
            <div class="overlay js-overlay"></div>
            <div class="popup" data-popup="some-popup">
              <button type="button" class="popup__close js-popup-close"></button>
              <div class="popup__wrap">

              </div>
            </div>
        </div>
    </div>
    <script src="assets/js/vendor.min.js" defer></script>
    <script src="assets/js/app.js" defer></script>
    <script src="https://kit.fontawesome.com/2c1fe779ee.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
</body>

</html>