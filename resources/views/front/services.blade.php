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
    <section class="services-sections">
        <div class="container">
            <h1 class="section-title">
                {{$main['name']}}
            </h1>
            <ul class="breadcrumbs">
                <li><a href="{{$home['url']}}">{{$home['name']}}</a></li>
                <li><a href="#">{{$main['name']}}</a></li>
            </ul>
            <div class="services-text">
                {{$main['text']}}
            </div>
            <div class="services-wrap">
                @foreach ($services as $service)
                <div class="services">
                    <a data-fancybox="gallery" href="{{$service['img']}}" class="services__wrap">
                        <div class="services__img">
                            <img src="{{$service['img']}}" alt="">
                        </div>
                        <div class="services__col">
                            <div class="services__title">{{$service['title']}}</div>
                            <ul class="services__list">
                                <li class="services__item">{{$service['list_item_1']}}</li>
                                <li class="services__item">{{$service['list_item_2']}}</li>
                                <li class="services__item">{{$service['list_item_3']}}</li>
                            </ul>
                        </div>
                    </a>
                </div>
                @endforeach
                {{-- <div class="services">
                    <a data-fancybox="gallery" href="assets/images/services2.jpg" class="services__wrap">
                        <div class="services__img">
                            <img src="assets/images/services2.jpg" alt="">
                        </div>
                        <div class="services__col">
                            <div class="services__title">Fashion</div>
                            <ul class="services__list">
                                <li class="services__item">Fashion photography</li>
                                <li class="services__item">Modeling gencies</li>
                                <li class="services__item">Make-up for photo shoots</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="services">
                    <a data-fancybox="gallery" href="assets/images/services3.jpg" class="services__wrap">
                        <div class="services__img">
                            <img src="assets/images/services3.jpg" alt="">
                        </div>
                        <div class="services__col">
                            <div class="services__title">Fashion</div>
                            <ul class="services__list">
                                <li class="services__item">Fashion photography</li>
                                <li class="services__item">Modeling gencies</li>
                                <li class="services__item">Make-up for photo shoots</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="services">
                    <a data-fancybox="gallery" href="assets/images/services4.jpg" class="services__wrap">
                        <div class="services__img">
                            <img src="assets/images/services4.jpg" alt="">
                        </div>
                        <div class="services__col">
                            <div class="services__title">Fashion</div>
                            <ul class="services__list">
                                <li class="services__item">Fashion photography</li>
                                <li class="services__item">Modeling gencies</li>
                                <li class="services__item">Make-up for photo shoots</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="services">
                    <a data-fancybox="gallery" href="assets/images/services5.jpg" class="services__wrap">
                        <div class="services__img">
                            <img src="assets/images/services5.jpg" alt="">
                        </div>
                        <div class="services__col">
                            <div class="services__title">Fashion</div>
                            <ul class="services__list">
                                <li class="services__item">Fashion photography</li>
                                <li class="services__item">Modeling gencies</li>
                                <li class="services__item">Make-up for photo shoots</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="services">
                    <a data-fancybox="gallery" href="assets/images/services6.jpg" class="services__wrap">
                        <div class="services__img">
                            <img src="assets/images/services6.jpg" alt="">
                        </div>
                        <div class="services__col">
                            <div class="services__title">Fashion</div>
                            <ul class="services__list">
                                <li class="services__item">Fashion photography</li>
                                <li class="services__item">Modeling gencies</li>
                                <li class="services__item">Make-up for photo shoots</li>
                            </ul>

                        </div>
                    </a>
                </div> --}}
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