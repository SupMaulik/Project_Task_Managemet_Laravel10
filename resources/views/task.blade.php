@extends('layouts.main')
@section('main-section')
  
@include('add_task')
@php

if(isset($task1)) //Start-> code to open Edit Task form model
{
  
           
                echo'
               <script type="text/javascript">
                window.onload = function () {
                OpenBootstrapPopup();
                };
                function OpenBootstrapPopup() {
                $("#modal-2").modal("show");
                }
                </script>';
}//End-> code to open Edit Task form model


if(session()->has('id1')) //Start-> code to open Add Task form model
{
           
           
                echo'
                <script type="text/javascript">
                window.onload = function () {
                OpenBootstrapPopup();
                };
                function OpenBootstrapPopup() {
                $("#modal-1").modal("show");
                }
                </script>';

                session()->forget('id1');

}  //End-> code to open Add Task form model



if(session()->has('id2'))//Start-> code to open Add Project form model
{
           
           
                echo'
                <script type="text/javascript">
                window.onload = function () {
                OpenBootstrapPopup();
                };
                function OpenBootstrapPopup() {
                $("#pmodal-1").modal("show");
                }
                </script>';

                session()->forget('id2');
}  //End-> code to open Add Project form model          
@endphp

<div class="container">
      <div class="row">
      <div class="col-lg-12">
       
      <form  method="POST" action="{{url('/selectproject')}}">
        @csrf
        <select style="float:left" name="mychoice" class="form-select w-25 " onchange="this.form.submit()">
            <option selected>Select Project</option>
            @foreach($project as $key)
            <option value="{{$key->Project_Name}}">{{$key->Project_Name}}</option>
            @endforeach
        </select>
      </form>

        <button style="float:right" class="btn btn-outline-info border rounded-pill border-primary float-end  mb-5" type="button" data-bs-target="#modal-1" data-bs-toggle="modal" style="font-family: Play, sans-serif;margin-top: 2px;"><i class="far fa-plus-square" style="margin-right: 10px;"></i>Add Task</button>
       
			<table class="table table-hover" id="myTable">
			  <thead>
				<tr>
				  <th scope="col" class="text-center">#</th>
				  <th scope="col">Task name</th>
				  <th scope="col">Priority</th>
				  <th scope="col">Time Stemp</th>
				  <th scope="col">Action</th>
				</tr>
			  </thead>
			  <tbody>
                 
                @if(isset($task))
                   
                @php
                $i=1
                @endphp
                @foreach($task as $item)
				<tr id="1" >
				  <td class="index">{{$i}}</td>
				  <td class="indexInput">{{$item->Task_Name}}</td>
				  <td>{{$item->Task_Priority}}</td>
				  <td>{{$item->created_at}}</td>
				  <td> <a href="{{url('/edit_task/')}}/{{$item->id}}" type="button"  class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
              <a href="{{url('delete_task/')}}/{{$item->id}}" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a></td>
				</tr>
                @php
                $i++
                @endphp
                @endforeach
                @endif
				
			  </tbody>
			</table>
        </div>
      </div>
    </div>
    


@endsection