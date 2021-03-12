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
                <h3 class="card-title">{{ Auth::user()->il->ad }} İller</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>


                        <th>İlçeler</th>
                        <th>Toplam Klorlama</th>
                        <th>Klor Dolum Tarihi</th>
                        <th>Klor Bitiş Tarihi</th>
                        <th>Klor Arıza</th>
                        <th>Depo Güvenliği</th>
                        <th>Akü Durumu</th>
                        <th>Depo Seviyesi - Son Güncelleme</th>
                        <th>Klor Ölçüm - Son Güncelleme</th>
                        <th>Pompa Arıza</th>
                        <th>Pompa & Pano Güvenliği</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Auth::user()->il->ilces as $key=>$value)
                        <tr>

                            <td>{{$value->ad}}</td>
                            <td>{{$value->sistems->count()}}</td>
                            <td>foo</td>
                            <td>foo</td>
                            <td>foo</td>
                            <td>Güvenli
                                İhlal
                            </td>
                            <td>foo</td>
                            <td>foo</td>
                            <td>foo</td>
                            <td>foo</td>
                            <td>foo</td>
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
