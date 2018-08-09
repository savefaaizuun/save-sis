@extends('layouts.master')



@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Tables</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Tables</a>
            </li>
            <li class="active">
                <strong>Data Tables</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <div class="box-btn-add" style="margin-top: 30px;">
            <button onclick="addForm()" class="btn btn-outline btn-info  dim" type="button"><i class="fa fa-plus"></i> Tambah</button>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Basic Data Tables example with responsive plugin</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <table id="konfig-tahun-table" class="table table-striped table-bordered table-hover" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Semester</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form method="post" class="form-horizontal" data-toggle="validator">
            {{ csrf_field() }} {{ method_field('POST')}}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id" name="id">
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Tahun</label>
                    <div class="col-md-6">
                        <input type="text" id="tahun_akademik" name="tahun_akademik" class="form-control" autofocus required>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Semester</label>
                    <div class="col-md-6">
                        <input type="text" id="semester" name="semester" class="form-control" required>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>          
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-save">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
        </form>
      
      
      
    </div>
  </div>
</div>
@endsection