<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div class="w-100">
            <button class="btn btn-outline-danger btn-add-product d-block ms-auto" data-toggle="modal"
                data-target="#modal-lg">Thêm</button>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Chiết khấu</th>
                    <th>Địa chỉ</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($company as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->discount }}</td>
                        {{-- <td>{{ $item->frequency }}</td> --}}
                        <td>{{ $item->isAddress->detail . ',' . $item->isAddress->isWards->name . ',' . $item->isAddress->isDistrict->name . ',' . $item->isAddress->isCity->name }}
                        </td>
                        <td><button class="btn btn-outline-danger btn-delete-class" data-class="company"
                                data-id="{{ $item->id }}"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/company/store" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Thêm dữ liệu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body row">
                        <div class="form-group col-sm-6">
                            <label for="name">Tên</label>
                            <input type="text" class="form-control form-control-border" name="name" id="name"
                                placeholder="Tên công ty">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="discount">Chiết khấu</label>
                            <input type="text" class="form-control form-control-border" id="discount"
                                name="discount" placeholder="Chiết khấu">
                        </div>
                        <h3>Địa chỉ</h3>
                        <div class="form-group col-sm-4">
                            <label>Tỉnh\TP</label>
                            <select required name="AddressCity" id="AddressCity" class="form-control select2"
                                style="width: 100%;">
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="AddressDistrict">Quận/Huyện</label>
                            <select id="AddressDistrict" name="AddressDistrict" style="width: 100%;"
                                class="form-control select2">
                            </select>
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="AddressWard">Phường/Xã</label>
                            <select id="AddressWard" name="AddressWard" style="width: 100%;"
                                class="form-control select2">
                            </select>
                        </div>


                        <div class="form-group col-sm-12">
                            <label for="AddressDetail">Chi tiết</label>
                            <input type="text" class="form-control form-control-border" id="AddressDetail"
                                name="AddressDetail" placeholder="Địa chỉ chi tiết">
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
        $('.select2').select2()
    });
</script>
