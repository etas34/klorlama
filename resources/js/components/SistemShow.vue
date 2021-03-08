<template>

    <!-- general form elements -->
    <div>

        <div class="container" :class="{'active' : run}">
            <div class="row">
                <div class="col col-12 py-3">
                    <h3>{{ sistem.ad }}</h3>
                </div>
                <div class="col col-12 mb-3">
                    <span id="fillingRate">{{ pixel }}%</span>
                </div>
                <div id="app" class="col col-12 mb-5">
                    <img id="machine" :src="'../../img/machine.svg'" alt="">
                    <div id="action">
                        <button v-on:click="runSystem" class="btn btn-pos"
                                :class="[!run ? 'btn-success' : 'btn-danger']"
                        >
                            {{ !run ? 'Sistemi Çalıştır' : 'Sistemi Durdur' }}
                        </button>
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
                            <div id="tankinnerwater" :style="'height: '+pixel+'%;'">
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

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Motor Bilgileri
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table">

                                <tbody>
                                <tr>

                                    <th scope="row">
                                        Pompa Zaman Aşımı
                                    </th>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" step="1" min="1" max="99" class="form-control"
                                                   aria-label="Sizing example input"
                                                   aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-success pull-right">Kaydet</button>
                                    </td>
                                </tr>
                                <tr>

                                    <th scope="row"> Yasaklı Zaman</th>
                                    <td>

                                        <div class="form-group">
                                            <p><strong>Saat Aralığı Seçin</strong></p>
                                            <select class="form-control-sm" id="exampleFormControlSelect1">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                            -

                                            <select class="form-control-sm">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>

                                        <button class="btn btn-success pull-right">Kaydet</button>
                                    </td>
                                </tr>
                                <tr>

                                    <th scope="row">Çalışma Tarihi :</th>
                                    <td colspan="2">14:20 - 03.02.2021</td>

                                </tr>
                                <tr>

                                    <th scope="row">Pompa Durumu :</th>
                                    <td colspan="2">Çalışıyor</td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Klor Bilgileri
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th scope="row">
                                        Klor atım süresi
                                    </th>
                                    <td>
                                        <input type="number" class="form-control" aria-label="Sizing example input"
                                               aria-describedby="cvw">
                                    </td>
                                    <td>
                                        <button class="btn btn-success">
                                            Kaydet
                                        </button>
                                    </td>
                                </tr>

                                <tr>

                                    <th scope="row">Klor Durumu :</th>
                                    <td colspan="2"> Var</td>

                                </tr>
                                <tr>

                                    <th scope="row">Klor Arıza Durumu :</th>
                                    <td colspan="2">Null</td>

                                </tr>
                                <tr>

                                    <th scope="row">Pompanın çalışmaması gereken zamanlar :</th>
                                    <td colspan="2"> 14-00 - 15-00</td>

                                </tr>
                                <tr>
                                    <th scope="row">Klor Dolum :</th>
                                    <td colspan="2">02.02.2021 - 14:40</td>
                                </tr>
                                <tr>
                                    <th scope="row">Klor Bitiş :</th>
                                    <td colspan="2">02.02.2021 - 14:40</td>
                                </tr>
                                <tr>
                                    <th scope="row">Klor Sonucu :</th>
                                    <td colspan="2">0.3 (ppm)</td>
                                </tr>
                                <tr>
                                    <th scope="row">Son ölçüm zamanı :</th>
                                    <td colspan="2">02.02.2021 - 14:40</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Depo Bilgileri
                            </h3>
                        </div>
                        <div class="card-body">

                            <table class="table">
                                <tbody>
                                <tr>

                                    <th scope="row">Seviye :</th>
                                    <td colspan="2"> % 70</td>

                                </tr>
                                <tr>

                                    <th scope="row">Üst seviye :</th>
                                    <td colspan="2">% 1252</td>

                                </tr>
                                <tr>

                                    <th scope="row">Alt seviye :</th>
                                    <td colspan="2"> % 415</td>

                                </tr>
                                <tr>
                                    <th scope="row">Depoya giren su miktarı :</th>
                                    <td colspan="2"> foo</td>
                                </tr>
                                <tr>
                                    <th scope="row">Debi ( m³/s) :</th>
                                    <td colspan="2"> bar</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Güvenlik Bilgileri
                            </h3>
                        </div>
                        <div class="card-body">

                            <table class="table">
                                <tbody>
                                <tr>

                                    <th scope="row">Haraket :</th>
                                    <td colspan="2"> Yok</td>

                                </tr>
                                <tr>

                                    <th scope="row">Kapı Güvenliği :</th>
                                    <td colspan="2"> Güvenli</td>

                                </tr>
                                <tr>

                                    <th scope="row">Pano Güvenliği :</th>
                                    <td colspan="2">Güvenli</td>

                                </tr>

                                </tbody>
                            </table>

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

.container.active #cogwheel img {
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

.container.active .waves.min .parallax > use {
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
            pixel: 70,
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

            // if (this.run) {
            //
            //
            //     for (let i = 1; i <= 100; i++) {
            //
            //
            //         setTimeout(function timer() {
            //             $this.pixel = i
            //         }, i * 120);
            //
            //     }
            // }

        }
    },
    mounted() {

    }


}
</script>
