@extends('layouts.custodian.custodian')

@section('content')

	<div class="content-wrapper">
			<section class="content">
      
      			<div class="card">
           			 <div class="card-header">
              			<h3 class="card-title">Rooms</h3>
               			<div>

                      @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
          </div>
          @endif

          @if ($message = Session::get('error'))
          <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
          </div>
          @endif

          @if ($message = Session::get('warning'))
          <div class="alert alert-warning alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
          </div>
          @endif

          @if ($message = Session::get('info'))
          <div class="alert alert-info alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
          </div>
          @endif

          @if ($errors->any())  
          <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          Please check the form below for errors
          </div>
          @endif
            				<div class="float-right">
              					<span><a href="{{route('custodian.newroom')}}"><i class="nav-icon fa fa-plus-circle">New room</i></a></span>              
           				 	</div>
         				    </div>
            		</div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Room no</th>
                  <th>Room type</th>
                  <th>DescrIption</th>
                  <th>image</th>
                  <th>status</th>
                  <th>price</th>
                  <th>booking price</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                 @foreach($rooms as $room)
                <tr>
                  <td>{{ $room->room_no}}</td>
                  <td>{{ $room->room_type}}</td>
                  <td>{!! $room->description!!}</td>
                  <td>{{ $room->image}}</td>
                  <td>{{ $room->status}}</td>
                  <td>{{ $room->price}}</td>
                  <td>{{ $room->booking_price}}</td>
                  <td><a href="" class = "btn btn-info">Edit</a></td>
                  <td><a href="{{route('custodian.destroy', ['id' => $room->id])}}" class = "btn btn-danger">Delete</a></td>
       

                </tr>
                @endforeach
              
              </tbody>
              <tfoot>
                  <tr>
                  <th>Room no</th>
                  <th>Room type</th>
                  <th>DescrIption</th>
                  <th>image</th>
                  <th>status</th>
                  <th>price</th>
                  <th>booking price</th>
                  <th colspan="2">Action</th>
                  
                </tr>
                </tfoot>
              </table>
            </div>
            
            <!-- /.card-body -->
            	</div>
      		</section>
        </div>     



@endsection