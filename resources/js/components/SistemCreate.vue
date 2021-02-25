<template>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
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
                                    <select class="form-control" required data-placeholder="İlçe Seçiniz">
                                        <option v-for="ilce in ilceler" :value="ilce.id">{{ ilce.ad}}</option>
                                    </select>
                                </div>


                                <div class="form-group col-md-12">
                                    <label>Sistem Adı</label>
                                    <input type="text" required name="name" class="form-control">
                                </div>



                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Kaydet</button>
                        </div>
                </div>
                <!-- /.card -->

            </div>
        </div>
</template>

<script>
    export default {

        data: function () {
            return {
                iller: [],
                ilceler: [],
                selected_il:''
            }
        },

        mounted() {

                this.getIl();

            // this.handleLogin();
        },

        methods: {

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
                this.getIlce(val)
            },
        }


    }
</script>
