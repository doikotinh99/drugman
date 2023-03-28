<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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
                    <th>Công ty</th>
                    <th>Ảnh</th>
                    <th>Hàm lượng</th>
                    <th>Đóng gói</th>
                    <th>Công dụng</th>
                    <th>Số đăng ký</th>
                    <th>Giá</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->company->name }}</td>
                        <td></td>
                        <td>{{ $item->frequency }}</td>
                        <td>{{ $item->packing }}</td>
                        <td>{{ $item->effect }}</td>
                        <td>{{ $item->registration_number }}</td>
                        <td>{{ $item->price }}</td>
                        <td><button class="btn btn-outline-danger btn-delete-class" data-class="product" data-id="{{ $item->id }}"><i
                                    class="fa-solid fa-trash"></i></button></td>
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
            <form action="/product/store" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Thêm dữ liệu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body row">
                        <div class="form-group col-sm-4">
                            <label for="name">Tên</label>
                            <input type="text" class="form-control form-control-border" name="name" id="name"
                                placeholder="Tên thuốc">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="company">Công ty</label>
                            <select class="custom-select form-control-border border-width-2" id="company"
                                name="company">
                                @foreach ($company as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="image">Đường dẫn ảnh</label>
                            <input type="text" class="form-control form-control-border" id="image" name="image"
                                placeholder="Đường dẫn ảnh">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="frequency">Hàm lượng</label>
                            <input type="text" class="form-control form-control-border" id="frequency"
                                name="frequency" placeholder="Hàm lượng">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="packing">Đóng gói</label>
                            <input type="text" class="form-control form-control-border" id="packing" name="packing"
                                placeholder="Đóng gói">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="effect">Tác dụng</label>
                            <input type="text" class="form-control form-control-border" id="effect" name="effect"
                                placeholder="Tác dụng">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="registration_number">Số đăng ký</label>
                            <input type="text" class="form-control form-control-border" id="registration_number"
                                name="registration_number" placeholder="Số đăng ký">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="price">Giá</label>
                            <input type="text" class="form-control form-control-border" id="price" name="price"
                                placeholder="giá">
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
    });
</script>
