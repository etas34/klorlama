<template>

    <!-- general form elements -->
    <div class="row container-fluid">

        <div class="col-md-12">

            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ sistem.ad }}

                    </h3>

                </div>

                <div class="card-body">


                    <button v-on:click="runSystem" class="btn btn-pos" :class="[!run ? 'btn-success' : 'btn-danger']"
                    >
                        {{ !run ? 'Sistemi Çalıştır' : 'Sistemi Durdur' }}
                    </button>
                    <h2 class="pos">{{ `${this.pixel} %` }} </h2>
                    <div class="boru" :style="[run ? {backgroundColor: '#1ca3ec'} : '' ]"></div>
                    <div class="su" :style="'height: ' + (420-(this.pixel * 4.2))   +'px'"></div>
                    <img v-if="run" :class="{ 'animate__slideInRight':run} "
                         class="sol-ok animate__animated animate__infinite infinite'"
                         :src="'../../img/left-arrow.png'">
                    <img v-if="run" :class="{ 'animate__slideInRight':run} "
                         class="sol-ok animate__animated animate__infinite infinite'"
                         style="left: 700px !important" :src="'../../img/left-arrow.png'" alt="arrow">
                    <img v-if="run" :class="{ 'animate__slideInRight':run} "
                         class="sol-ok animate__animated animate__infinite infinite'"
                         style="left: 800px !important" :src="'../../img/left-arrow.png'">
                    <img class="resim" :src="'../../img/Website.png'" alt="slsl">
                    <img :class="{'rotating': run}" class="cark" :src="'../../img/settings.png'" alt="slsl">
                </div>
                <!-- /.card-body -->
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
                    <ul  class="list-unstyled">
                        <li>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Pompa zaman aşımı</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
                                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="cvw">
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
                                <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
    <!-- /.card -->
</template>
<style scoped>

@-webkit-keyframes rotating /* Safari and Chrome */
{
    from {
        -webkit-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    to {
        -webkit-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}

@keyframes rotating {
    from {
        -ms-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -webkit-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    to {
        -ms-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}

.rotating {
    -webkit-animation: rotating 2s linear infinite;
    -moz-animation: rotating 2s linear infinite;
    -ms-animation: rotating 2s linear infinite;
    -o-animation: rotating 2s linear infinite;
    animation: rotating 2s linear infinite;
}

.btn-pos {
    left: 1070px;
    top: 400px;
    position: absolute;
    z-index: 1000
}

.su {
    position: absolute;
    top: 370px;
    left: 209px;
    z-index: 1000;
    width: 304px;
    vertical-align: central;
    text-align: center;
    background-color: rgb(246, 246, 246);
}

.boru {
    position: absolute;
    top: 600px;
    height: 30px;
    left: 520px;
    width: 450px;
}

.resim {
    position: relative;
    top: 50px;
    left: 130px;
}

.sol-ok {
    position: absolute;
    left: 600px;
    top: 597px;
    width: 35px;
}

.cark {
    position: absolute;
    z-index: 1000;
    left: 1085px;
    top: 580px;
    width: 80px;
}

.pos {
    position: absolute;
    top: 300px;
    left: 320px;
    z-index: 5000;

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
    }


}
</script>
