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
                        <td>Toplam Klorlama</td>
                        <td>Klor Ölçüm</td>
                        <td>Pompa Kontrol</td>
                        <td>Klor Bi̇ten</td>
                        <td>Depo Güvenli̇ği̇</td>
                        <td>Klorlama Ariza</td>
                        <td>K.ölçüm Ariza</td>
                        <td>Akü Ariza</td>
                        <td>Pompa Ariza</td>
                        <td>Pompa Güvenli̇ği̇</td>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Auth::user()->il->ilces as $key=>$value)
                        <tr>

                            <td>{{$value->ad}}</td>
                            <td>{{$value->sistems->count()}}</td>
                            <td>
                                @if(( $cihaz = $value->sistems->count()) == 0)
                                    <b><strong>Cihaz YOK</strong></b>
                                @else
                                    {{ $cihaz }}
                                @endif
                            </td>
                            <td>
                                @if(( $cihaz = $value->sistems->count()) == 0)
                                    <b><strong>Cihaz YOK</strong></b>
                                @else
                                    {{ $cihaz }}
                                @endif
                            </td>
                            <td>

                             Klor biten:   {{ $value->sistems->where('klor_sonucu',0)->count() }}

                            </td>
                            <td>
                                <b><strong>Güvenli
                                        :</strong></b> {{ $value->sistems->where('depo_guvenlik',1)->count() }}
                                <br/>
                                <b><strong>İhlal :</strong></b> {{ $value->sistems->where('depo_guvenlik',0)->count() }}
                            </td>
                            <td>
                                @if( $value->sistems->where('klor_ariza_durum',1)->count() == 0 )
                                    <b><strong>YOK</strong></b>
                                @else
                                    {{ $value->sistems->where('klor_ariza_durum',1)->count() }}
                                @endif
                            </td>
                            <td>foo</td>
                            <td>
                                {{ $value->sistems->where('aku_ariza',0)->count() }}
                                {{--                                Belirli bir yüzdeden sonrası arızalı, where 0 kalkacak--}}
                            </td>
                            <td>
                                <b><strong> Normal
                                        :</strong></b> {{ $value->sistems->where('pompa_durumu',1)->count() }}
                                <br/>
                                <b><strong> Arıza :</strong></b> {{ $value->sistems->where('pompa_durumu',0)->count() }}

                            </td>
                            <td>

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
