@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    
    




    
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <!-- //seach -->
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
    @foreach($users as $user)

              <div>
                <table>
                  
                    <tr  style="display:grid;grid-template-columns:repeat(13,100px)">
                      <th style="grid-column: 1/2;">{{$user->id}}</th>
                      <th style="grid-column: 2/4;">{{$user->name}}</th>
                      <th style="grid-column: 5/8;">{{$user->created_at}}</th>
                      <th style="grid-column: 9/12;">{{$user->email}}</th>
                      <th style="grid-column: 13/13;"><button type="button" class="btn btn-block btn-danger btn-sm" >Xóa</button></th>
                        
                    </tr>

                  
                  @endforeach
    
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
