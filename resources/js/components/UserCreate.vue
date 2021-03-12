<template>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->

                <form @submit.prevent="storeSistem">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">
                            Kullanıcı - Yeni Oluştur
                        </h3>
                    </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label>Kullanıcı Adı</label>
                                    <input type="text" required name="name" class="form-control" v-model="formData.name">
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Email</label>
                                    <input type="email" required name="email" class="form-control" v-model="formData.email">
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Şifre</label>
                                    <input type="text" required name="password" class="form-control" v-model="formData.password">
                                </div>



                                <h5 class="col-md-12">Yetki</h5>
                                <div class="form-group col-md-4">
                                    <label>İl</label>
                                    <select class="form-control select2" required data-placeholder="İl Seçiniz" v-select2  v-model="selected_il">
                                        <option value="*">Tümü</option>
                                        <option v-for="il in iller" :value="il.id">{{ il.ad}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>İlçe</label>
                                    <select v-if="selected_il && selected_il!=='*'" class="form-control" required data-placeholder="İlçe Seçiniz" v-model="selected_ilce">
                                        <option value="*">Tümü</option>
                                        <option v-for="ilce in ilceler" :value="ilce.id">{{ ilce.ad}}</option>
                                    </select>
                                </div>


                                <div class="form-group col-md-4">
                                    <label>Sistem</label>
                                    <select  v-if="selected_il && selected_il!=='*' && selected_ilce && selected_ilce!=='*'" class="form-control" required data-placeholder="Sistem Seçiniz" v-model="selected_sistem">
                                        <option value="*">Tümü</option>
                                        <option v-for="sistem in sistemler" :value="sistem.id">{{ sistem.ad}}</option>
                                    </select>
                                </div>


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
                <!-- /.card -->
                </form>

            </div>
        </div>
</template>

<script>
    export default {

        data: function () {
            return {
                iller: [],
                ilceler: [],
                sistemler: [],
                selected_il:'',
                selected_ilce:'',
                selected_sistem:'',
                disableSubmit: false,

                formData: {
                    ilce_id: '',
                    il_id: '',
                    sistem_id: '',
                    name: '',
                    email: '',
                    password: '',
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
                axios.post('/api/user/store', this.formData)
                    .then((response) => {
                        Vue.$toast.success('Kayıt Başarı İle Eklendi!', {
                            position: 'top-right'
                        })
                    }).catch(function (error) {
                    if (error.response.status === 422){
                        $.each(error.response.data.errors, function(key, value) {

                            Vue.$toast.error(value[0], {position: 'top-right'})
                        });

                    }
                    else {
                        Vue.$toast.error('Bir Şeyler Ters Gitti!', {position: 'top-right'})
                    }
                }).finally(() => {
                    this.disableSubmit = false;
                    this.formData.name = '';
                    this.formData.email = '';
                    this.formData.password = '';
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

            getSistem(ilce_id){

                axios.get('/api/sistem',{
                    params: {
                        ilce_id:ilce_id
                    }
                })
                    .then((response) => {
                        this.sistemler=response.data;
                        console.log(response.data)

                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },

        },

        watch : {
            selected_il(val) {
                if (val == '*'){
                    this.selected_ilce = null
                    this.selected_sistem = null
                }

                this.formData.il_id = val
                this.getIlce(val)
            },

            selected_ilce(val){

                if (val == '*'){
                    this.selected_sistem = null
                }
                this.formData.ilce_id = val
                this.getSistem(val)
            },
            selected_sistem(val) {

                this.formData.sistem_id = val
            },
        }


    }
</script>
