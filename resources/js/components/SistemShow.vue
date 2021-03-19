<template>

    <!-- general form elements -->
    <div>

        <div class="container" :class="{'active' : run}">
            <div class="row">
                <div class="col col-6 py-3">
                    <h3>{{ sistem.ad }}</h3>

                </div>

                <div class="col col-12 mb-3">
                    <span id="fillingRate">{{ pixel }}%</span>
                    <button id="guncelle"  class="btn btn-pos runSystem btn-warning  "
                             style="width: 148px;"
                    >
                        Sistemi Güncelle
                    </button>
                </div>
                <div id="app" class="col col-12 mb-5">
                    <img id="machine" :src="'../../img/machine.svg'" alt="">
                    <div id="action">

                        <div v-if="!run" class="input-group mb-3">
                            <input type="number" min="1" max="999" style="width: 55px !important;"
                                   aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-success" v-on:click="run = true" type="button"
                                        id="button-addon2">
                                    Dk Çalıştır
                                </button>
                            </div>
                        </div>
                        <button style="width: 148px" v-on:click="runSystem" class="btn btn-pos mb-2 runSystem"
                                :class="[!run ? 'btn-success' : 'btn-danger']">
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
                                        <input type="number"
                                               min="1"
                                               max="99"
                                               v-on:keyup.enter="klorAtimSureSubmit"
                                               class="form-control"
                                               aria-label="Sizing example input"
                                               v-model="klorAtimSure"
                                               aria-describedby="cvw">
                                        <small id="uyari" v-show="checkKlorAtimSure" class="form-text text-danger">Değer 1 ila 99
                                            arası olmalı</small>

                                    </td>
                                    <td>
                                        <button
                                            :disabled="checkKlorAtimSure || kLoad"
                                            @click="klorAtimSureSubmit"
                                            class="btn btn-success">
                                             <span v-if="kLoad"
                                                   class="spinner-border spinner-border-sm"
                                                   role="status"
                                                   aria-hidden="true"></span>
                                            {{ kLoad ? '' : 'Kaydet' }}

                                        </button>
                                    </td>
                                </tr>

                                <tr>

                                    <th scope="row">Klor Durumu :</th>
                                    <td colspan="2"> {{ sistem.klor_durum }}</td>

                                </tr>
                                <tr>

                                    <th scope="row">Klor Arıza Durumu :</th>
                                    <td colspan="2">{{ sistem.klor_ariza_durum }}</td>

                                </tr>
                                <tr>
                                    <th scope="row">Klor Dolum Zamanı:</th>
                                    <td colspan="2">{{ sistem.klor_dolum }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Klor Bitiş Zamanı:</th>
                                    <td colspan="2"> {{ sistem.klor_bitis }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Klor Ölçüm Sonucu :</th>
                                    <td colspan="2">{{ sistem.klor_sonucu }} (ppm)</td>
                                </tr>
                                <tr>
                                    <th scope="row">Son Ölçüm Zamanı :</th>
                                    <td colspan="2">{{ sistem.son_olcum_zaman }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Son Ölçüm Zamanı :</th>
                                    <td colspan="2">{{ sistem.son_olcum_zaman }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">2.Klor atım Periyod Saati: </th>
                                    <td colspan="2">

                                        <div class="form-group">
                                            <input type="number"

                                                   v-on:keyup.enter="periodAtimSubmit"
                                                   min="1" step="1"
                                                   v-model="periodSaat"
                                                   class="form-control"
                                                   id="periodSaat">
                                        </div>



                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2.Klor atım Periyodu Saniyesi: </th>
                                    <td>

                                        <div class="form-group">
                                            <input type="number"

                                                   v-on:keyup.enter="periodAtimSubmit"
                                                   min="1" step="1" v-model="periodSaniye" class="form-control" id="periodSaniye">
                                        </div>





                                    </td>
                                    <td>
                                        <button
                                            :disabled="kLoad || checkperiodAtim"
                                            @click="periodAtimSubmit"
                                            class="btn btn-success">
                                             <span v-if="kLoad"
                                                   class="spinner-border spinner-border-sm"
                                                   role="status"
                                                   aria-hidden="true"></span>
                                            {{ kLoad ? '' : 'Kaydet' }}

                                        </button>
                                    </td>
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
                                    <td colspan="2"> % {{ sistem.depo_seviye }}</td>

                                </tr>
                                <!--                                <tr>-->

                                <!--                                    <th scope="row">Üst seviye :</th>-->
                                <!--                                    <td colspan="2">% {{ sistem.alt_limit }}</td>-->

                                <!--                                </tr>-->
                                <!--                                <tr>-->

                                <!--                                    <th scope="row">Alt seviye :</th>-->
                                <!--                                    <td colspan="2"> % {{ sistem.ust_limit }}</td>-->

                                <!--                                </tr>-->
                                <tr>
                                    <th scope="row">Debi ( m³/s) :</th>
                                    <td colspan="2">{{ sistem.debi }}</td>
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
    /*box-sizing: -webkit-border-box;*/
}

html,
body {
    margin: 0;
    padding: 15px;
    outline: none;
}
th {
    width: 250px;
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

    #action {
        top: -10px;
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

    #action {
        top: -10px;
        right: -10px;
    }

    #action button {
        font-size: 10px;
        padding: .3em .5em;
    }

    .runSystem {
        width: 113px !important;
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

    #action {
        top: -40px;
        right: -3px;
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

    .runSystem {
        width: 113px !important;
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
            user_id: this.sistem.id,
            pixel: 70,
            run: false,
            uyari: '',
            pLoad: true,
            kLoad: false,
            pompaZamanAsim: this.sistem.pompa_zaman_asimi,
            klorAtimSure: this.sistem.klor_atim_sure,
            periodSaat: this.sistem.period_saat,
            periodSaniye: this.sistem.period_saniye,
        }
    },
    computed: {
        checkKlorAtimSure: function () {
            return (
                this.klorAtimSure < 1 ||
                this.klorAtimSure > 99 ||
                this.klorAtimSure === ''
            )
        },
        checkperiodAtim: function () {
            return(
                this.periodSaat < 1 ||
                this.periodSaniye < 1 ||
                this.periodSaat === '' ||
                this.periodSaniye === ''
            )
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
        klorAtimSureSubmit() {
            var data = {
                klor_atim_sure: this.klorAtimSure
            }
            if (!this.checkperiodAtim && confirm(`Klor atım süresi ${this.klorAtimSure} olarak ayarlanacak emin misiniz?`)) {
                // console.log(this.klorAtimSure)
                this.kLoad = true
                axios.post(`/api/sistem/klor-atim-sure/${this.user_id}`, data)
                    .then((response) => {
                        Vue.$toast.success('Kayıt Başarı İle Eklendi!', {
                            position: 'top-right'
                        })
                    }).catch(function (error) {
                    if (error.response.status === 422) {
                        $.each(error.response.data.errors, function (key, value) {

                            Vue.$toast.error(value[0], {position: 'top-right'})
                        });

                    } else {
                        Vue.$toast.error('Bir Şeyler Ters Gitti!', {
                            position: 'top-right'
                        })
                    }

                }).finally(() => {
                    this.kLoad = false
                });
            }
        },

        periodAtimSubmit() {
            var data = {
                period_saniye: this.periodSaniye,
                period_saat: this.periodSaat,
            }
            if (!this.checkperiodAtim && confirm(`Klor atım Periodu ${this.periodSaat} saat, ${this.periodSaniye} saniye olarak ayarlanacak emin misiniz?`)) {
                // console.log(this.klorAtimSure)
                this.kLoad = true
                axios.post(`/api/sistem/klor-atim-period/${this.user_id}`, data)
                    .then((response) => {
                        Vue.$toast.success('Kayıt Başarı İle Eklendi!', {
                            position: 'top-right'
                        })
                    }).catch(function (error) {
                    if (error.response.status === 422) {
                        $.each(error.response.data.errors, function (key, value) {

                            Vue.$toast.error(value[0], {position: 'top-right'})
                        });

                    } else {
                        Vue.$toast.error('Bir Şeyler Ters Gitti!', {
                            position: 'top-right'
                        })
                    }

                }).finally(() => {
                    this.kLoad = false
                });
            }
        },


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
        var width = $(window).width();
        $(window).resize(function () {
            if (width <= 780) {
                $('#guncelle').addClass('btn-sm');
                $('#uyari').val('')
            }
        });
    }


}
</script>
