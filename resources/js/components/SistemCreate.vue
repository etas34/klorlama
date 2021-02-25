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
                                        <option></option>
                                        <option v-for="il in iller" :value="il.id">{{ il.ad}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>İlçe</label>
                                    <select class="form-control select2" required data-placeholder="İlçe Seçiniz" >
                                        <option>Alaska</option>
                                        <option>California</option>
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>
                                    </select>
                                </div>


                                <div class="form-group col-md-12">
                                    <label>Sistem Adı</label>
                                    <input type="text" required name="name" class="form-control"  :value="selected_il">
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
                selected_il:''
            }
        },

        mounted() {
            this.getIl();

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

            }

        },

        watch : {
            selected_id:  {

                handler(val){
                    console.log(val)
                },
                deep: true
            },

        }


    }
</script>
