@extends('layouts/default')

@section('content')

@section('header_styles')
<link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/responsive/2.0.2/css/responsive.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="{{asset('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css')}}"/>
@endsection

<div class="box">
    @include('admin/messages')

    <div class="box-header">

        @check("manage_companies")
        <a href="{{url('admin/companies/create')}}" class="btn btn-primary"><span class="fa  fa-plus-square"></span> Add Company </a>
        @endcheck
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table id="companies" class="display responsive nowrap  table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                         <th>Accounts Number</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Accounts Number</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
<!-- /.box -->
<!-- DataTables -->
@section('footer_scripts')
<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.0.2/js/dataTables.responsive.min.js"></script>
<script src="{{asset('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

<script>
$(function () {

    var dataTable = $('#companies').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('/') }}/admin/companies/dataTables",
        },
        columns: [
            {data: 'name', name: 'name'},
              {data: 'created_at', name: 'created_at'},
            {data: 'address', name: 'address'},
            {data: 'phone', name: 'phone'},
            {data: 'updated_at', name: 'updated_at'},
          
        ]
    });


});
function confirm_delete() {
    var confirm = window.confirm("Are you sure you want to delete this category ?");
    return confirm ? true : false;
}
</script>
@endsection
@endsection