<header class="header">
    <div class="container header__wrap">
        <nav class="nav js-burger" id="nav">
            <div class="logo">
                {{-- TODO:картинку грузить со стороны бэка --}}
                <a href="/" class="logo-active">
                    <img src="assets/images/logo.png" alt="">
                </a>
                {{-- END --}}
            </div>
            
            <ul class="nav__list">
                @foreach($pages as $page)
                <li class="nav__item"><a href="{{$page['url']}}">{{$page['name']}}</a></li>
                @endforeach
            </ul>
            
            <div class="nav-footer">
                <ul class="nav-footer__list">
                    <div class="nav-footer__item">
                        <span class="nav-footer__icon">
                            <?xml version="1.0" encoding="iso-8859-1"?>
                            <!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 width="477.156px" height="477.156px" viewBox="0 0 477.156 477.156" style="enable-background:new 0 0 477.156 477.156;"
                                 xml:space="preserve">
                            <g>
                                <path d="M475.009,380.316l-2.375-7.156c-5.625-16.719-24.062-34.156-41-38.75l-62.688-17.125c-17-4.625-41.25,1.594-53.688,14.031
                                    l-22.688,22.688c-82.453-22.28-147.109-86.938-169.359-169.375L145.9,161.94c12.438-12.438,18.656-36.656,14.031-53.656
                                    l-17.094-62.719c-4.625-16.969-22.094-35.406-38.781-40.969L96.9,2.19c-16.719-5.563-40.563,0.063-53,12.5L9.962,48.659
                                    C3.899,54.69,0.024,71.94,0.024,72.003c-1.187,107.75,41.063,211.562,117.281,287.781
                                    c76.031,76.031,179.454,118.219,286.891,117.313c0.562,0,18.312-3.813,24.375-9.845l33.938-33.938
                                    C474.946,420.878,480.571,397.035,475.009,380.316z"/>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            </svg>

                        </span>
                        <a href="tel:+18005596580" class="nav-footer__link ">{{$contacts['phone']}}</a>
                    </div>
                    <div class="nav-footer__item">
                        <span class="nav-footer__icon">
                            <?xml version="1.0" encoding="iso-8859-1"?>
                            <!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 width="485.211px" height="485.211px" viewBox="0 0 485.211 485.211" style="enable-background:new 0 0 485.211 485.211;"
                                 xml:space="preserve">
                            <g>
                                <path d="M485.211,363.906c0,10.637-2.992,20.498-7.785,29.174L324.225,221.67l151.54-132.584
                                    c5.895,9.355,9.446,20.344,9.446,32.219V363.906z M242.606,252.793l210.863-184.5c-8.653-4.737-18.397-7.642-28.908-7.642H60.651
                                    c-10.524,0-20.271,2.905-28.889,7.642L242.606,252.793z M301.393,241.631l-48.809,42.734c-2.855,2.487-6.41,3.729-9.978,3.729
                                    c-3.57,0-7.125-1.242-9.98-3.729l-48.82-42.736L28.667,415.23c9.299,5.834,20.197,9.329,31.983,9.329h363.911
                                    c11.784,0,22.687-3.495,31.983-9.329L301.393,241.631z M9.448,89.085C3.554,98.44,0,109.429,0,121.305v242.602
                                    c0,10.637,2.978,20.498,7.789,29.174l153.183-171.44L9.448,89.085z"/>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            </svg>

                        </span>
                        <a href="mailto:mail@mail.mail" class="nav-footer__link">{{$contacts['mail']}}</a>
                    </div>
                </ul>
                <div class="nav-social">
                    {{-- TODO:с админки --}}
                    <ul class="nav-social__list">
                        @foreach($socials as $social)
                            <li class="nav-social__item">
                                <a href="{{$social['link']}}" alt="{{$social['title']}}" class="nav-social__link fa {{$social['icon_name']}}"></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="policy">
                    {{-- TODO: с админки --}}
                    <span class="policy__text">Intense Photographer Portfolio © 2022. </span>
                    <a href="#" class="policy__link">Privacy Policy</a>
                </div>
            </div>
        </nav>

        <div class="burger js-burger-open">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header>