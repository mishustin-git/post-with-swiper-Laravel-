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
    <section class="contact-sections">
        <div class="container">
            <h1 class="section-title">
                {{$main['name']}}
            </h1>
            <ul class="breadcrumbs">
                <li><a href="{{$home['url']}}">{{$home['name']}}</a></li>
                <li><a href="#">{{$main['name']}}</a></li>
            </ul>
            <p class="contact__text">
                {{$main['text']}}
            </p>
            <div class="contact">
                <div class="contact__wrap">
                    <div class="contact__form">
                        <form name="contactUsForm" id="contactUsForm" method="post" action="javascript:void(0)">
                            <div class="row more-tablet">
                                @csrf
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">{{ __($lang.'.name') }}</label>
                                        <input type="text" name="name">
                                        <span class="validation-error">{{ __($lang.'.required') }}</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="phone">{{ __($lang.'.phone') }}</label>
                                        <input type="tel" name="phone">
                                        <span class="validation-error">{{ __($lang.'.required') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">{{ __($lang.'.mail') }}</label>
                                        <input type="email" name="email">
                                        <span class="validation-error">{{ __($lang.'.required') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="message">{{ __($lang.'.message') }}</label>
                                        <textarea name="message" id="" cols="30" rows="10"></textarea>
                                        <span class="validation-error">{{ __($lang.'.required') }}</span>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col contact__form-button">
                                        <button class="btn primary">
                                            {{ __($lang.'.message') }}
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="contact__info">
                        <a href="#" class="contact__info-addr"><i class="fa-solid fa-location-dot"></i> {{$contacts['addr']}}</a>
                        <a href="tel:" class="contact__info-tel"><i class="fa-solid fa-phone"></i>{{$contacts['phone']}}</a>
                        <a href="mailto:" class="contact__info-mail"><i class="fa-solid fa-envelope"></i>{{$contacts['mail']}}</a>
                        <ul class="contact__info-social">
                            @foreach ($socials as $social)
                                <li><a href="{{$social['link']}}" class="fa {{$social['icon_name']}}"></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="map">
            <div class="map__wrap">
                {{-- TODO: map with langtitude and latitude --}}
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Abf051b7b36f31d858a79d5bdc77417d96900ffaf5bb76b5f96b6d66225f82da2&amp;width=100%&amp;height=400&amp;lang=en_FR&amp;scroll=true"></script>
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
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    if ($("#contactUsForm").length > 0) {
        $("#contactUsForm").validate({
            // rules: {
            //     name: {
            //         required: true,
            //         maxlength: 50
            //     },
            //     email: {
            //         required: true,
            //         maxlength: 50,
            //         email: true,
            //     },  
            //     message: {
            //         required: true,
            //         maxlength: 300
            //     },   
            // },
            // messages: {
            //     name: {
            //         required: "Please enter name",
            //         maxlength: "Your name maxlength should be 50 characters long."
            //     },
            //     email: {
            //         required: "Please enter valid email",
            //         email: "Please enter valid email",
            //         maxlength: "The email name should less than or equal to 50 characters",
            //     },   
            //     message: {
            //         required: "Please enter message",
            //         maxlength: "Your message name maxlength should be 300 characters long."
            //     },
            // },
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $('#submit').html('Please Wait...');
            $("#submit"). attr("disabled", true);
            $.ajax({
                url: "{{url('store-data')}}",
                type: "POST",
                data: $('#contactUsForm').serialize(),
                success: function( response ) {
                    $('#submit').html('Submit');
                    $("#submit"). attr("disabled", false);
                    alert('Ajax form has been submitted successfully');
                document.getElementById("contactUsForm").reset(); 
                }
            });
        }
        })
    }
    </script>
</body>

</html>