@extends('layouts.main')
@section('title')
    <div>
        <main class="main">
            <div class="about_text_name">
                <h1>Контакты</h1>
            </div>

            <article>
                <div class="about_text">
                    <p>Номер телефона: +7 (812) 210 20 83</p>
                    <p>Почтовый адрес: support@stream-telecom.ru</p>
                </div>
            </article>
        </main>

        <section>
            <div class="about_text_name">
                <h2>Адрес:</h2>
            </div>

            <div class="about_text_location">
                <div class="location">
                    <div style="position:relative;overflow:hidden;"><a
                            href="https://yandex.ru/maps/org/obukhov_tsentr/1045677093/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:0px;">Обуховъ-Центр</a><a
                            href="https://yandex.ru/maps/2/saint-petersburg/category/business_center/184107509/?utm_medium=mapframe&utm_source=maps"
                            style="color:#eee;font-size:12px;position:absolute;top:14px;">Бизнес-центр в
                            Санкт‑Петербурге</a>
                        <iframe
                            src="https://yandex.ru/map-widget/v1/?from=api-maps&ll=30.479039%2C59.851257&mode=poi&origin=jsapi_2_1_79&poi%5Bpoint%5D=30.478603%2C59.851222&poi%5Buri%5D=ymapsbm1%3A%2F%2Forg%3Foid%3D1045677093&z=16.6"
                            width="560" height="400" frameborder="1" allowfullscreen="true"
                            style="position:relative;"></iframe>
                    </div>
                </div>

                <div>
                    <br>
                    <p>192012, Санкт-Петербург, пр. Обуховской обороны 271, БЦ ОБУХОВ-ЦЕНТР оф. 1001</p>
                </div>
            </div>
        </section>

        <footer class="footer bottom" style="margin-top: 100px;margin-left: 50px;">
            <div class="footer_bottom">
                <div class="footer_phones">
                    <div class="phone_list_SPb">
                        СПб:
                        <a href="tel:+78122102218">+7 (812) 210-22-18</a>
                    </div>

                    <div class="phone_list_RF">
                        Бесплатно по России:
                        <a href="tel:+78122102218"> +7 (800) 333-10-75</a>
                    </div>

                    <div class="footer_time">
                        <p>График работы офиса: с 9:00 до 19:00</p>
                    </div>

                    <div class="footer_mail">
                        E-mail:
                        <a href="mailto:sales@stream-telecom.ru">sales@stream-telecom.ru</a>
                    </div>
                </div>

                <div class="footer_name">
                    <p>&copy Северо-Западная Компания "Инфосвязь" 2008-2023</p>
                </div>
            </div>
        </footer>
    </div>
@endsection
