@extends('layouts/default')

@section('content')
@section('header_styles')

@endsection

<div class="box">
    <div class="box-header">


    </div>
    <!-- /.box-header -->
    <div class="box-body">
        @include('admin/messages')
        <form action="{{url('/admin/states/')}}/{{$state->id}}" method="POST" >

            <div class="col-md-6">

                <div class="form-group">
                    <label><strong>  Name</strong></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-question"></i></span>
                        <input value="{{ $state->name }}"  type="text" placeholder="Name" name="name" class="form-control">
                    </div>
                </div>
              
                <br>
                <button type="submit" class="btn btn-success  btn-block" name="submit"><i class="fa fa-flag"></i> Update State</button>
            </div>
            {{ csrf_field() }}
               <input type="hidden" name="country_id" value="{{$state->country_id}}"/>
            <input type="hidden" name="_method" value="PUT"/>

        </form>        
    </div>

</div>
<!-- /.box -->
<!-- DataTables -->
@section('footer_scripts')

@endsection
@endsection