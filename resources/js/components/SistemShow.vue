<template>

    <!-- general form elements -->
    <div>


        <div class="container">
            <div class="row">
                <div class="col col-12 py-3">
                    <h3 >{{ sistem.ad }}</h3>
                </div>
                <div class="col col-12">
                    <span id="fillingRate">20%</span>
                </div>
                <div id="app" class="col col-12 mb-5">
                    <img id="machine" :src="'../../img/machine.svg'" alt="">
                    <div id="action">
                        <button>Sistemi Çalıştır</button>
                    </div>
                    <div id="cogwheel" class="d-flex justify-content-center align-items-center">
                        <img :src="'../../img/cogwheel.svg'" alt="">
                    </div>
                    <div id="waterbox">
                        <div id="water">
                            <svg class="waves min" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                 viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                                <defs>
                                    <path id="gentle-wave"
                                          d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"/>
                                </defs>
                                <g class="parallax">
                                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.5"/>
                                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.3)"/>
                                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.2)"/>
                                    <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(255,255,255,0.5)"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div id="watertank">
                        <div id="tankinner" class="d-flex justify-content-end align-items-end">
                            <div id="tankinnerwater" style="height: 20%;">
                                <svg class="waves" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                     viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                                    <defs>
                                        <path id="gentle-wave"
                                              d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"/>
                                    </defs>
                                    <g class="parallax">
                                        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgb(26 183 239 / 70%)"/>
                                        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgb(26 183 239 / 50%)"/>
                                        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgb(26 183 239 / 30%)"/>
                                        <use xlink:href="#gentle-wave" x="48" y="7" fill="#1ab7ef"/>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Depo Bilgileri
                            </h3>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>Seviye : % {{ pixel }}</li>
                                <li>Üst seviye : % 1252</li>
                                <li>Alt seviye : % 415</li>
                                <li>Depoya giren su miktarı : foo</li>
                                <li>Debi ( m³/s) : bar</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Motor Bilgileri
                            </h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"
                                              id="inputGroup-sizing-sm">Pompa zaman aşımı</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                               aria-describedby="inputGroup-sizing-sm">
                                        <div class="input-group-append">
                                            <button class="btn btn-success">Kaydet</button>
                                        </div>
                                    </div>

                                </li>
                                <li>Çalışma Tarihi : 14:20 - 03.02.2021</li>
                                <li>Pompa Durumu : Çalışıyor</li>
                                <li>Pompanın çalışmaması gereken zamanlar : 14-00 - 15-00</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Klor Bilgileri
                            </h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="cvw">Klor atım süresi</span>
                                        </div>
                                        <input type="number" class="form-control" aria-label="Sizing example input"
                                               aria-describedby="cvw">
                                        <div class="input-group-append">
                                            <button class="btn btn-success">Kaydet</button>
                                        </div>
                                    </div>

                                </li>
                                <li>Klor Durumu : Var</li>
                                <li>Klor Arıza Durumu : null</li>
                                <li>Klor Dolum : 02.02.2021 - 14:40</li>
                                <li>Klor Bitiş : 02.02.2021 - 14:40</li>
                                <li>Klor Sonucu : 0.3 (ppm)</li>
                                <li>Son ölçüm zamanı</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Klor Bilgileri
                            </h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="klorvs">Klor atım süresi</span>
                                        </div>
                                        <input type="number" class="form-control" aria-label="Sizing example input"
                                               aria-describedby="inputGroup-sizing-sm">
                                        <div class="input-group-append">
                                            <button class="btn btn-success">Kaydet</button>
                                        </div>
                                    </div>

                                </li>
                                <li>Klor Durumu : Var</li>
                                <li>Klor Arıza Durumu : null</li>
                                <li>Klor Dolum : 02.02.2021 - 14:40</li>
                                <li>Klor Bitiş : 02.02.2021 - 14:40</li>
                                <li>Klor Sonucu : 0.3 (ppm)</li>
                                <li>Son ölçüm zamanı</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
</template>
<style scoped>
@import url(//fonts.googleapis.com/css?family=Lato:300:400);

* {
    box-sizing: border-box;
    box-sizing: -webkit-border-box;
}

html,
body {
    margin: 0;
    padding: 15px;
    outline: none;
}

img {
    max-width: 100%;
}

#app {
    position: relative;
}

#cogwheel {
    position: absolute;
    right: 74px;
    top: 50%;
    width: 100px;
    height: 120px;
    z-index: 2;
    transform: translateY(-15%);
    -o-transform: translateY(-15%);
    -moz-transform: translateY(-15%);
    -webkit-transform: translateY(-15%);
}

#action {
    position: absolute;
    right: 5%;
    top: 10%;
}

#action button {
    background-color: tomato;
    color: #fff;
    padding: .5em 1em;
    border-radius: 3px;
    cursor: pointer;
    font-size: 13px;
    border: none;
}

#waterbox {
    width: 460px;
    height: 38px;
    background: #1ab7ef;
    position: absolute;
    top: 54%;
    right: -87px;
    left: 0;
    margin: auto;
    overflow: hidden;
}

#watertank {
    width: 340px;
    height: 460px;
    background: #fff;
    position: absolute;
    top: 25px;
    left: 30px;
    overflow: hidden;
}

#fillingRate {
    font-weight: 500;
    width: 50px;
    height: 50px;
    display: inline-block;
    line-height: 45px;
    background: #1ab7ef;
    font-size: 14px;
    border-radius: 50px;
    text-align: center;
    border: 3px solid #80c4dc;
    color: #fff;
}

#tankinner {
    height: 100%;
    background: #f1f1f1;
}

#tankinnerwater {
    background: #1ab7ef;
    width: 100%;
}

body.active #cogwheel img {
    animation: chark 3s linear infinite;
}

@keyframes chark {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}


/* responsive */


@media (max-width: 1200px) {
    #cogwheel {
        right: 64px;
        width: 85px;
        height: 100px;
    }

    #waterbox {
        width: 387px;
        height: 32px;
        right: -76px;
    }

    #watertank {
        width: 280px;
        height: 380px;
    }
}

@media (max-width: 992px) {
    #cogwheel {
        right: 52px;
        width: 63px;
        height: 75px;
    }

    #waterbox {
        width: 285px;
        height: 23px;
        right: -55px;
    }

    #watertank {
        width: 200px;
        height: 270px;
    }
}

@media (max-width: 768px) {
    #cogwheel {
        right: 42px;
        width: 47px;
        height: 54px;
    }

    #waterbox {
        width: 212px;
        height: 17px;
        right: -40px;
    }

    #action button {
        font-size: 12px;
        padding: .3em .5em;
    }

    #watertank {
        width: 140px;
        height: 190px;
    }
}

@media (max-width: 576px) {
    html, body {
        padding: 15px 0;
    }

    #cogwheel {
        right: 8.5vw;
        width: 8vw;
        height: 9vw;
    }

    #waterbox {
        width: 40vw;
        height: 3.5vw;
        right: -7vw;
        top: 53.5%;
    }


    #watertank {
        width: 26%;
        height: 83%;
        left: 25px;
        top: 20px;
    }
}

@media (max-width: 450px) {
    #watertank {
        width: 25%;
        height: 82%;
        left: 24px;
        top: 19px;
    }

    #waterbox {
        width: 39vw;
        top: 54%;
    }
}


@media (max-width: 400px) {
    #cogwheel {
        right: 9.2vw;
        width: 7.5vw;
        height: 9vw;
    }
}


.waves {
    position: relative;
    width: 100%;
    margin-top: -25%;
}

.waves.min {
    margin: 0;
    height: 39px;
}

.waves.min .parallax > use {
    animation: unset;
}

body.active .waves.min .parallax > use {
    animation: move-forever2 5s cubic-bezier(.55, .5, .45, .5) infinite;
}

.parallax > use {
    animation: move-forever 25s cubic-bezier(.55, .5, .45, .5) infinite;
}

.parallax > use:nth-child(1) {
    animation-delay: -2s;
    animation-duration: 7s;
}

.parallax > use:nth-child(2) {
    animation-delay: -3s;
    animation-duration: 10s;
}

.parallax > use:nth-child(3) {
    animation-delay: -4s;
    animation-duration: 13s;
}

.parallax > use:nth-child(4) {
    animation-delay: -5s;
    animation-duration: 20s;
}

.waves.min .parallax > use:nth-child(1) {
    animation-delay: -2s;
    animation-duration: 7s;
}

.waves.min .parallax > use:nth-child(2) {
    animation-delay: -3s;
    animation-duration: 10s;
}

.waves.min .parallax > use:nth-child(3) {
    animation-delay: -4s;
    animation-duration: 13s;
}

.waves.min .parallax > use:nth-child(4) {
    animation-delay: -5s;
    animation-duration: 20s;
}

@keyframes move-forever {
    0% {
        transform: translate3d(-90px, 0, 0);
    }
    100% {
        transform: translate3d(85px, 0, 0);
    }
}

@keyframes move-forever2 {
    0% {
        transform: translate3d(85px, 0, 0);
    }
    100% {
        transform: translate3d(-90px, 0, 0);
    }
}

</style>
<script>
export default {
    props: ['sistem'],

    data: function () {
        return {
            pixel: 0,
            run: false,
            uyari: ''
        }
    },

    watch: {
        pixel: function () {
            if (this.pixel < 0)
                return this.pixel = 0
            if (this.pixel >= 100) {
                this.pixel = 100
                // this.run = false
            }
            this.uyari = this.pixel == 100 ? "\nTamamen Dolu" : ""
        }
    },
    methods: {
        runSystem: function () {
            var $this = this
            this.run = !this.run

            if (this.run) {


                for (let i = 1; i <= 100; i++) {


                    setTimeout(function timer() {
                        $this.pixel = i
                    }, i * 120);

                }
            }

        }
    },
    mounted() {
        $(function(){
            $('#action button').on('click', function(){
                if( !$('body').hasClass('active') ){
                    $('body').addClass('active');
                    $(this).text('Sistemi Durdur');
                }else{
                    $('body').removeClass('active');
                    $(this).text('Sistemi Çalıştır');
                }
            });
        });
    }


}
</script>
