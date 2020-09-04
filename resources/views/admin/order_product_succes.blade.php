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

                <!-- <h3 class="card-title">Responsive Hover Table</h3> -->
                <a class="card-title" href="{{URL::to('/admin/add_product_form')}}"><button type="button" class="btn btn-block btn-primary btn-sm" >Thêm sản phẩm</button></a>
               

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

              <div>
                <table>
                <tr  style="display:grid;grid-template-columns:repeat(13,100px)">
                      <th style="grid-column: 1/2;">id</th>
                      <th style="grid-column: 2/4;">name</th>
                      <th style="grid-column: 5/6;">price</th>
                      <th style="grid-column: 6/9;">image</th>
                        
                    </tr>
    @foreach($products as $product)
                  
                    <tr  style="display:grid;grid-template-columns:repeat(13,100px)">
                      <th style="grid-column: 1/2;">{{$product->id}}</th>
                      <th style="grid-column: 2/4;">{{$product->name}}</th>
                      <th style="grid-column: 5/6;">{{$product->price}}</th>
                      <th style="grid-column: 6/9;"><img src="/uploads/product/{{$product->img}}" height="100" width="100"></th>
                      <th style="grid-column: 12/13;"><button type="button" class="btn btn-block btn-primary btn-sm" >Sửa</button></th>
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
