<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0, maximum-scale=1.0, user-scalable=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <link rel="stylesheet" href="/css/style2.css">
</head>
<body>
<header style="background: url({{$main_image}})" class="flex-center center-align background-2 flex-column full-window">
    <div class="container">
        <h1 class="text-shadow white-text">{{$full_title}}</h1>
        <h2 class="text-shadow white-text">{{$header_info}}</h2>
    </div>
</header>
<div class="block flex-center cyan darken-1 full-window">
    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <div class="card card-panel flex-between h20 hoverable">
                    <div class="card-image">
                        <img src="{{$ef1}}" alt="">
                    </div>
                    <div class="card-content center-align full-w">
                        <span><{{$ef1_inf}}/span>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card card-panel flex-between h20 hoverable">
                    <div class="card-image">
                        <img src="{{$ef2}}" alt="">
                    </div>
                    <div class="card-content center-align full-w">
                        <span>{{$ef2_inf}}</span>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card card-panel flex-between h20 hoverable">
                    <div class="card-image">
                        <img src="{{$ef3}}" alt="">
                    </div>
                    <div class="card-content center-align full-w">
                        <span>{{$ef3_inf}}</span>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card card-panel flex-between h20 hoverable">
                    <div class="card-image">
                        <img src="{{$ef4}}" alt="">
                    </div>
                    <div class="card-content center-align full-w">
                        <span>{{$ef4_inf}}</span>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card card-panel flex-between h20 hoverable">
                    <div class="card-image">
                        <img src="{{$ef5}}" alt="">
                    </div>
                    <div class="card-content center-align full-w">
                        <span>{{$ef5_inf}}</span>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card card-panel flex-between h20 hoverable">
                    <div class="card-image">
                        <img src="{{$ef6}}" alt="">
                    </div>
                    <div class="card-content center-align full-w">
                        <span>{{$ef6_inf}}</span>
                    </div>
                </div>
            </div>
            <div class="center-align full-w white-text">
                {{$centers}}
                <a class="white-text" href="https://goodline.info/pomosh/podklyuchen-li-vash-dom.html">формой</a>.
            </div>
        </div>
    </div>
</div>
</div>
<div class="block flex-center  inline">
    <div class="container margin-40">
        <div class="row">
            <div class="col s12 xl10 offset-xl1">
                <div class="card">
                    <div class="row">
                        <div class="col l6 s12">
                            <div class="card-image">
                                <div class="row">
                                    <img class="col offset-s2 s8 m12" src="{{$lef1}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col l6 s12">
                            <div class="card-content">
                                <div class="flow-text">{{$lef1_title}}
                                </div>
                                {{$lef1_inf}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 xl10 offset-xl1">
                <div class="card">
                    <div class="row">
                        <div class="col l6 s12">
                            <div class="card-content">
                                <div class="flow-text">{{$lef2_title}}</div>
                                {{$lef2_inf}}
                            </div>
                        </div>
                        <div class="col l6 s12">
                            <div class="card-image">
                                <div class="row">
                                    <img class="col s9 offset-s2 m12" src="{{$lef2}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 xl10 offset-xl1">
                <div class="card">
                    <div class="row">
                        <div class="col l6 s12">
                            <div class="card-image">
                                <div class="row">
                                    <img class="col s9 offset-s2 m12" src="{{$lef3}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col l6 s12">
                            <div class="card-content">
                                <div class="flow-text">{{$lef3_title}}</div>
                                {{$lef3_inf}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block hide-on-med-and-down flex-center full-window background-1" style="background: url({{$background_2}})">
    <div class="container">
        <div class="row">

            <div class="col s10 offset-s1">

                <div class="tariff__item" id="701">
                    <div class="tariff__item_header">
                        <div class="tariff__item_header--title">{{$price1}}</div>
                        <div class="tariff__item_header--desc"></div>
                        <div class="tariff__item_header--addition">
                            <span class="green_span">Новинка</span>
                            <span class="red_span">Для новых абонентов</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="tariff__item_body flex-center">
                        <div class="tariff__item_body--speed tariff__item_body--item speed-medium">
                            <div class="tariff__item_body--header"><a
                                        href="start/internet/podklyuchit-internet-ot-good-line.html">Интернет</a></div>
                            <div class="speed--count">75</div>
                            <div class="speed--size">Мбит/с</div>
                        </div>
                        <div class="tariff__item_body--speed green tariff__item_body--item tariff__item_body--btv">
                            <div class="tariff__item_body--header"><a
                                        href="start/bolshoe-tv/podklyuchit-czifrovoe-tv-ot-good-line.html">Большое
                                    ТВ</a></div>
                            <div class="speed--count">100</div>
                            <div class="speed--size">каналов</div>
                            <div class="old--price">160 руб/мес</div>
                            <div class="new--price tooltip" data-tooltip-content="#custom-tip">Бесплатно</div>
                        </div>
                        <div class="tariff__item_body--speed tariff__item_body--item tariff__item_body--console">
                            <div class="tariff__item_body--header"><a
                                        href="start/bolshoe-tv/oborudovanie.html">Приставка</a></div>
                            <div class="old--price">4500 руб</div>
                            <div class="new--price">В подарок</div>
                        </div>
                        <div class="tariff__item_body--price tariff__item_body--item">
                            <div class="indent20"></div>
                            <div class="price--count">{{$price1}}</div>
                            <div class="price--size"></div>
                            <div class="indent20"></div>
                            <a class="button rightChoice" href="system/pop-up/701.html">Подключить</a>
                            <div class="indent20"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="tariff__item" id="801">
                    <div class="tariff__item_header">
                        <div class="tariff__item_header--title">{{$price2}}</div>
                        <div class="tariff__item_header--desc"></div>
                        <div class="tariff__item_header--addition">
                            <span class="green_span">Новинка</span>
                            <span class="red_span">Для новых абонентов</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="tariff__item_body flex-center">
                        <div class="tariff__item_body--speed tariff__item_body--item speed-high">
                            <div class="tariff__item_body--header"><a
                                        href="start/internet/podklyuchit-internet-ot-good-line.html">Интернет</a></div>
                            <div class="speed--count">100</div>
                            <div class="speed--size">Мбит/с</div>
                        </div>

                        <div class="tariff__item_body--speed tariff__item_body--item tariff__item_body--wifi">
                            <div class="tariff__item_body--header"><a
                                        href="uslugi/servis-i-oborudovanie/oborudovanie/router-good-line.html">Wi-Fi
                                    роутер</a>
                            </div>
                            <div class="old--price">2000 руб</div>
                            <div class="new--price">В подарок</div>
                        </div>

                        <div class="tariff__item_body--speed tariff__item_body--item tariff__item_body--btv">
                            <div class="tariff__item_body--header"><a
                                        href="start/bolshoe-tv/podklyuchit-czifrovoe-tv-ot-good-line.html">Большое
                                    ТВ</a></div>
                            <div class="speed--count">100</div>
                            <div class="speed--size">каналов</div>
                            <div class="old--price">160 руб/мес</div>
                            <div class="new--price tooltip" data-tooltip-content="#custom-tip">Бесплатно</div>
                        </div>
                        <div class="tariff__item_body--speed tariff__item_body--item tariff__item_body--console">
                            <div class="tariff__item_body--header"><a
                                        href="start/bolshoe-tv/oborudovanie.html">Приставка</a></div>
                            <div class="old--price">4500 руб</div>
                            <div class="new--price">В подарок</div>
                        </div>
                        <div class="tariff__item_body--price tariff__item_body--item">
                            <div class="indent20"></div>
                            <div class="price--count">{{$price2}}</div>
                            <div class="price--size"></div>
                            <div class="indent20"></div>
                            <a class="button rightChoice" href="system/pop-up/801.html">Подключить</a>
                            <div class="indent20"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="col s12 flex-center">
                <a href="#" class="btn waves-effect waves-light">Все тарифы</a>
            </div>
        </div>
    </div>
</div>
<section id="invite" class="pad-lg light-gray-bg">
    <div class="container">
        <div class="row">
            <div class="col offset-l2 offset-m2 m8 l8 s12">
                <div class="card-panel flex-center flex-column">
                    <div class="excellent flex-center" style="display: none">
                        <h2>Заказ оформлен</h2>
                    </div>
                    <form action="/main/add" method="POST" id="form">
                        @csrf
                        <div class="input-field">
                            <input name="name" id="form_name" type="text" class="validate">
                            <label for="form_name">Имя</label>
                        </div>
                        <div class="input-field">
                            <input name="email" id="form_email" type="text" class="validate">
                            <label for="form_email">Почта</label>
                        </div>
                        <div class="input-field">
                            <input name="phone" id="form_phone" class="phone" type="tel"
                                   placeholder="+7 ( ) - -">
                            <label for="form_phone">Контактный телефон</label>
                        </div>
                        <div class="input-field">
                            <input name="message" id="form_lorem" type="text" class="validate">
                            <label for="form_lorem">Доп. информация</label>
                        </div>
                        <div class="input-field">
                            <div><span class="p range-slider">Кол-во товара</span></div>
                            <div class="range-slider flex-center">
                                <input class="range-slider__range" type="range" name="count" value="5" min="1" max="25">
                                <span class="range-slider__value">0</span>
                            </div>
                        </div>
                        <div class="input-box flex-center">
                            <label>
                                <input name="grant" type="checkbox">
                                <span>Согласие на обработку персональных данных</span>
                            </label>
                        </div>
                        <div class="flex-center">
                            @captcha()
                        </div>
                        <div class="input-box flex-center">
                            <button name="start" value="start" class="btn waves-effect waves-light">оформить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="page-footer cyan">
    <div class="container">
        <div class="row">
            <div class="col l4 m6 s12">
                <h5 class="white-text">О КОМПАНИИ</h5>
                <ul>
                    <li>Новости Good Line</li>
                    <li>Центры обслуживания</li>
                    <li>Документы</li>
                    <li>Реквизиты</li>
                    <li>Вакансии</li>
                </ul>
            </div>
            <div class="col l4 m6 s12">
                <h5 class="white-text">УСЛУГИ</h5>
                <ul>
                    <li>Сервис и оборудование</li>
                    <li>Роутер Good Line</li>
                    <li>Калькулятор услуг</li>
                    <li>Бамбук ТВ</li>
                    <li>Dr.Web</li>
                    <li>Wi-Fi зоны</li>
                </ul>
            </div>
            <div class="col l4 m6 s12">
                <h5 class="white-text">ПОМОЩЬ</h5>
                <ul>
                    <li>Удаленный помощник</li>
                    <li>Приложение «Техподдержка»</li>
                    <li>Подключен ли ваш дом?</li>
                    <li>Инструкция по настройке ТВ</li>
                    <li>Конфиденциальность</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/js/mask.js"></script>
<script>
    $(function () {


        var rangeSlider = function () {
            var slider = $('.range-slider'),
                range = $('.range-slider__range'),
                value = $('.range-slider__value');

            slider.each(function () {

                value.each(function () {
                    var value = $(this).prev().attr('value');
                    $(this).html(value);
                });

                range.on('input', function () {
                    $(this).next(value).html(this.value);
                });
            });
        };
        $("#form_phone").mask("+9(999)999-99-99");
        rangeSlider();

        $('form').submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $(".loader").removeClass("hidden");
                },
                success: function (result) {
                    $(".loader").addClass("hidden");
                    let response = grecaptcha.getResponse();
                    if (response.length >= 10) {
                        let current = $("button[name=start]").parent().parent();
                        current.fadeOut();
                        $(".excellent").delay(500).fadeIn();
                        let height = current.height();
                        let width = current.width();
                        $(".excellent").width(width).height(height);
                    }
                    else {
                        M.toast({html: 'Капча не прошла'});
                    }
                    M.toast({html: result});
                },
                error: function (result) {
                    let data = result.responseJSON.message;
                    let error = result.responseJSON.errors;
                    if (data !== undefined) {
                        M.toast({html: error[Object.keys(error)[0]]});
                    }
                    $(".loader").addClass("hidden");
                },
            });
        });

    })
</script>
</body>
