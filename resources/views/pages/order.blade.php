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
                    <th>Tên khách hàng</th>
                    <th>Ngày</th>
                    <th>Trạng thái</th>
                    <th>Tổng hóa đơn</th>
                    <th>Hoa hồng</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $item)
                    <tr>
                        <td>{{ $item->isVendor->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            @if ($item->order_success == null)
                                <button type="button" disabled class="btn btn-block btn-danger btn-xs">Chưa
                                    giao</button>
                            @else
                                <button type="button" disabled class="btn btn-block btn-success btn-xs">{{$item->order_success}}</button>
                            @endif
                        </td>
                        <td>{{$item->invoice}}</td>
                        <td>{{$item->commission}}</td>
                        <td><button class="btn btn-outline-danger btn-delete-class" data-class="order"
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
            <form action="/order/store" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Thêm dữ liệu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <div class="form-group w-100">
                                    <label for="vendor">Cửa hàng</label>
                                    <select class="custom-select form-control-border border-width-2" id="vendor"
                                        name="vendor">
                                        @foreach ($vendor as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name . ' - ' . $item->isAddress->isWards->name . ' - ' . $item->isAddress->detail }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table" id="tableModalInsertOrder">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Tên sản phẩm</th>
                                            <th style="width: 120px">Số lượng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>
                                                <div class="form-group">
                                                    <select required name="product[]" class="form-control select2 product"
                                                        style="width: 100%;">
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="count[]"
                                                        id="count">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                                <div class="w-100"><button type="button" class="btn btn-primary btnAdd w-100">Thêm sản
                                        phẩm</button></div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
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
