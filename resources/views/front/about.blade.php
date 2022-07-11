@include("front.head")
@include('front.header', ['pages'=>$pages,'contacts'=>$contacts,'socials'=>$socials])
<main class="main">
    <section class="parallax-sections" style="background-image: url('assets/images/home3.jpg');background-position: center 17%;background-repeat: no-repeat;background-size: cover;background-attachment: fixed;">
        <div class="container">
            <div class="parallax">
                <div class="parallax__wrap">
                    <a href="#" class="main-title">{{$main['title']}}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="about-sections">
        <div class="container">
            <h1 class="section-title">
                {{$main['name']}}
            </h1>
            <ul class="breadcrumbs">
                <li><a href="/">{{$home['name']}}</a></li>
                <li><a href="#">{{$main['name']}}</a></li>
            </ul>
            <div class="about">
                <div class="about__wrap">
                    <div class="about__col">
                        <div class="about__img">
                            <img src="{{$main['img']}}" alt="">
                        </div>
                        <div class="about__btn">
                            <button class="btn primary">
                                {{$main['button_text']}}
                            </button>
                        </div>
                    </div>
                    <div class="about__text">
                        {!! $main['text'] !!}
                    </div>                
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