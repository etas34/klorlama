<x-layouts.admin-app>
@push('styles')
    <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet"
              href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

<!-- Main content -->
    <section class="content">

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Sistemler</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>


                        <th>İl</th>
                        <th>İlçe</th>
                        <th>Sistem Adı</th>
                        <th>Motor Numarası</th>
                        <th>Klorlama Numarası</th>
                        <th>Klor Ölçüm Numarası</th>
                        <th>Klor</th>
                        <th>Pompa</th>
                        <th>Elektrik</th>
                        <th>Kapı Güvenliği</th>
                        <th>Depo Güvenliği</th>
                        <th>Pano Güvenliği</th>
                        <th>İşlemler</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sistem as $key => $value)
                        <tr>
                            <td>{{$value->il->ad}}</td>
                            <td>{{$value->ilce->ad}}</td>
                            <td>{{$value->ad}}</td>
                            <td>{{$value->motor_tel}}</td>
                            <td>{{$value->klorlama_tel}}</td>
                            <td>{{$value->klor_olcum_tel}}</td>
                            <td>{{$value->klor}}</td>
                            <td>{{$value->pompa}}</td>
                            <td>{{$value->elektrik}}</td>
                            <td>{{$value->kapi_guvenlik}}</td>
                            <td>{{$value->depo_guvenlik}}</td>
                            <td>{{$value->pano_guvenlik}}</td>
                            <td>
                                <a href="{{route('sistem.show',$value)}}"> <span
                                        class="badge bg-success p-2">Göster</span></a>
                                <a href="{{route('sistem.edit',$value)}}"> <span
                                        class="badge bg-warning p-2">Düzenle</span></a>
                                <a onclick="return confirm('Kayıt silinecek, emin misiniz?')"
                                   href="{{route('sistem.destroy',$value)}}">
                                    <span class="badge bg-danger p-2">Sil</span></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </section>


    <!-- /.content -->

    <!-- /.content-wrapper -->
    <!-- /.content -->
@push('script')
    <!-- DataTables  & Plugins -->
        <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
    @endpush
</x-layouts.admin-app>
