<template>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <form @submit.prevent="storeSistem">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">
                            Sistem - Yeni Oluştur
                        </h3>
                    </div>
                    <div class="card-body">

                        <div class="row">


                            <div class="form-group col-md-6">
                                <label>İl</label>
                                <select class="form-control select2" required data-placeholder="İl Seçiniz" v-select2
                                        v-model="selected_il">
                                    <option v-for="il in iller" :value="il.id">{{ il.ad }}</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>İlçe</label>
                                <select class="form-control" required data-placeholder="İlçe Seçiniz"
                                        v-model="formData.ilce_id">
                                    <option v-for="ilce in ilceler" :value="ilce.id">{{ ilce.ad }}</option>
                                </select>
                            </div>


                            <div class="form-group col-md-12">
                                <label>Sistem Adı</label>
                                <input ref="clear" type="text" required name="ad" class="form-control"
                                       v-model="formData.ad">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Motor Numarası</label>
                                <input ref="clear" type="text" v-mask="'0 (###) ###-####'"
                                       class="form-control" v-model="formData.motor_tel">

                            </div>
                            <div class="form-group col-md-12">
                                <label>Klorlama Numarası</label>
                                <input ref="clear" type="text" v-mask="'0 (###) ###-####'"
                                       class="form-control" v-model="formData.klorlama_tel">

                            </div>
                            <div class="form-group col-md-12">
                                <label>Klor Ölçüm Numarası</label>
                                <input ref="clear" type="text" v-mask="'0 (###) ###-####'"
                                       class="form-control" v-model="formData.klor_olcum_tel">

                            </div>
<!--                            <div class="col-md-12">-->

<!--                                <div class="card">-->
<!--                                    <div class="card-header">-->
<!--                                        <h3 class="card-title">-->
<!--                                            İletişim Bilgileri-->
<!--                                        </h3>-->
<!--                                    </div>-->
<!--                                    <div class="card-body">-->
<!--                                        <div class="form-group col-md-12">-->
<!--                                            <label>1.Kişi</label>-->
<!--                                            <input ref="clear" type="text" v-mask="'0 (###) ###-####'"-->
<!--                                                   class="form-control" v-model="formData.birinci_numara">-->

<!--                                        </div>-->

<!--                                        <div class="form-group col-md-12">-->
<!--                                            <label>2.Kişi</label>-->
<!--                                            <input ref="clear" type="text" v-mask="'0 (###) ###-####'"-->
<!--                                                   class="form-control" v-model="formData.ikinci_numara">-->

<!--                                        </div>-->

<!--                                        <div class="form-group col-md-12">-->
<!--                                            <label>3.Kişi</label>-->
<!--                                            <input ref="clear" type="text" v-mask="'0 (###) ###-####'"-->
<!--                                                   class="form-control" v-model="formData.ucuncu_numara">-->

<!--                                        </div>-->

<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->


                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button :disabled="disableSubmit" type="submit" class="btn btn-primary float-right">
                            <span v-if="disableSubmit" class="spinner-border spinner-border-sm" role="status"
                                  aria-hidden="true"></span>
                            <span v-if="!disableSubmit">Kaydet</span>

                        </button>
                    </div>
                </div>
            </form>
            <!-- /.card -->

        </div>
    </div>
</template>

<script>
import {TheMask} from 'vue-the-mask'

export default {
    components: {TheMask},
    data: function () {
        return {
            iller: [],
            ilceler: [],
            selected_il: '',
            disableSubmit: false,

            formData: {
                ilce_id: '',
                il_id: '',
                ad: '',
                klorlama_tel: '',
                motor_tel: '',
                klor_olcum_tel: '',
                birinci_numara: '',
                ikinci_numara: '',
                ucuncu_numara: '',
            }

        }
    },

    mounted() {

        this.getIl();

        // this.handleLogin();
    },

    methods: {
        storeSistem(event) {
            this.disableSubmit = true
            axios.post('/api/sistem/store', this.formData)
                .then((response) => {
                    console.log(response)
                    Vue.$toast.success('Kayıt Başarı İle Eklendi!', {
                        position: 'top-right'
                    })
                }).catch(function (error) {
                if (error.response.status === 422) {
                    $.each(error.response.data.errors, function (key, value) {

                        Vue.$toast.error(value[0], {position: 'top-right'})
                    });

                } else {
                    Vue.$toast.error('Bir Şeyler Ters Gitti!', {position: 'top-right'})
                }

            }).finally(() => {
                this.disableSubmit = false
                this.formData.ad = ''
                this.formData.telefon = ''
            });

        },
        getIl() {
            axios.get('/api/il')
                .then((response) => {
                    this.iller = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });

        },
        getIlce(il_id) {

            axios.get('/api/ilce', {
                params: {
                    il_id: il_id
                }
            })
                .then((response) => {
                    this.ilceler = response.data;
                    // console.log(response.data)

                })
                .catch(function (error) {
                    console.log(error);
                });

        },

    },

    watch: {
        selected_il(val) {
            this.formData.il_id = val
            console.log(val)
            this.getIlce(val)
        },
        // 'formData.alt_limit'(){
        //     if (100<this.formData.alt_limit)
        //         this.formData.alt_limit = 100
        // },
        // 'formData.ust_limit'(){
        //     if (0>this.formData.alt_limit)
        //         this.formData.alt_limit = 0
        // }
    }


}
</script>
