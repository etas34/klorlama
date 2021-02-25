<template>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <form @submit.prevent="storeSistem">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Sistem - Yeni Oluştur
                        </h3>
                    </div>
                        <div class="card-body">

                            <div class="row">


                                <div class="form-group col-md-6">
                                    <label>İl</label>
                                    <select class="form-control select2" required data-placeholder="İl Seçiniz" v-select2  v-model="selected_il">
                                        <option v-for="il in iller" :value="il.id">{{ il.ad}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>İlçe</label>
                                    <select class="form-control" required data-placeholder="İlçe Seçiniz" v-model="formData.ilce_id">
                                        <option v-for="ilce in ilceler" :value="ilce.id">{{ ilce.ad}}</option>
                                    </select>
                                </div>


                                <div class="form-group col-md-6">
                                    <label>Sistem Adı</label>
                                    <input type="text" required name="ad" class="form-control" v-model="formData.ad">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Telefon Numarası</label>
                                    <input type="text" v-mask="'0 (###) ###-####'" required name="telefon" class="form-control" v-model="formData.telefon">

                                </div>



                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Kaydet</button>
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
                selected_il:'',

                formData: {
                    ilce_id: '',
                    il_id: '',
                    ad:'',
                    telefon:''
                }

            }
        },

        mounted() {

                this.getIl();

            // this.handleLogin();
        },

        methods: {
            storeSistem(){

                axios.post('/api/sistem/store',this.formData)
                    .then((response)=>{
                        Vue.$toast.success('Kayıt Başarı İle Eklendi!.', {
                            // override the global option
                            position: 'top-right'

                        })
                       console.log(response.data)

                    }).catch(function (error) {
                    console.log(error);
                });
            },
            getIl(){

                axios.get('/api/il')
                    .then((response) => {
                        this.iller=response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
            getIlce(il_id){

                axios.get('/api/ilce',{
                    params: {
                        il_id:il_id
                    }
                })
                    .then((response) => {
                         this.ilceler=response.data;
                         // console.log(response.data)

                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },

        },

        watch : {
            selected_il(val) {
                this.formData.il_id = val
                this.getIlce(val)
            }
        }


    }
</script>
