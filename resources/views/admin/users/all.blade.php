@extends('layouts/default')

@section('content')

@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{asset('bower_components/AdminLTE/plugins/select2/select2.min.css')}}"/>
<link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/responsive/2.0.2/css/responsive.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="{{asset('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css')}}"/>
@endsection

<div class="box">
    @include('admin/messages')

    <div class="box-header">

        @check("manage_users")
        <a href="{{url('admin/users/create')}}" class="btn btn-primary"><span class="fa  fa-user-plus"></span> Add User </a>
        <a href="{{url('admin/users/trashed')}}" class="btn btn-danger"><span class="fa  fa-warning"></span> Banned Users</a>
        @endcheck
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        @if(count($roles) > 0)
        <div class="form-group">
            <label><strong>Search By Role</strong></label>
            <select  id="roles" name="roles">
                <option value="0">Select Role</option>
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->label}}</option>
                @endforeach
            </select>
        </div>


        @endif
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table id="users" class=" display responsive nowrap table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Username</th>
                        @check("manage_companies")
                        <th>Company</th>
                        @endcheck
                        <th>Avatar</th>
                        <th>Email</th>
                        <th>Role(s)</th>
                        <th>Created</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Username</th>
                        @check("manage_companies")
                        <th>Company</th>
                        @endcheck
                        <th>Avatar</th>
                        <th>Email</th>
                        <th>Role(s)</th>
                        <th>Created</th>
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
<script src="{{asset('bower_components/AdminLTE/plugins/select2/select2.full.min.js')}}"></script>
<script>
$(function () {

    $("select#roles").select2();


    var dataTable = $('#users').DataTable({
    "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            processing: true,
            serverSide: true,
            ajax: {
            url: "{{ url('/') }}/admin/users/dataTables",
                    data: function (params) {
                    params.role = $("select#roles").val()
                    }
            },
            columns: [
            {data: 'username', name: 'Username'},
                    @check("manage_companies")
            {data: 'company_id', name: 'company_id'},
                    @endcheck
            {data: 'avatar', name: 'Avatar'},
            {data: 'email', name: 'Email'}
            ,
            {data: 'bio', name: 'bio'}
            ,
            {data: 'created_at', name: 'created_at'}
            ,
            {data: 'updated_at', name: 'updated_at'
            }
            ]
});

$('select#roles').on('change', function (e) {
dataTable.draw();
        e.preventDefault();
});
        }
);

function confirm_delete() {
    var confirm = window.confirm("Are you sure you want to ban this user ?");
    return confirm ? true : false;
}
</script>
@endsection
@endsection