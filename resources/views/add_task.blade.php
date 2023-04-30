<!-- Start: Add Project Modal -->
<div class="modal fade" role="dialog" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" id="pmodal-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #e0e5f5;">
                <h5 class="fs-6 fw-bold text-primary mb-0">Add Project</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         
        <div class="modal-body" style="background: rgba(255,255,255,0);">
            <div class="card shadow" style="margin-right: auto;margin-left: auto;width: auto;">
                <div class="card-body">
                    <p class="card-text"></p>
                    <form id="form1" action="{{url('/')}}/addproject" method="post">
                        @csrf
                        <label class="form-label" style="font-weight: bold;">Project Name</label><span style="color: var(--bs-red);font-weight: bold;">*</span>
                        <input id="category" class="border rounded border-secondary form-control form-control-sm" type="text" placeholder="Project Name" name="project" autocomplete="on"  >
                        <span class="text-danger ">
               @error('project')

               {{$message}}
               @enderror

                        
                        <button id="myaddcat" class="btn btn-outline-dark btn-sm text-center border rounded-pill border-secondary float-end" type="submit" style="margin-right: auto;margin-left: auto;margin-top: 20px;font-weight: bold;" name="myaddcat">Add Project</button></form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
<!-- End: Add Project Modal -->


<!-- Start: Add Task Modal -->
<div class="modal fade" role="dialog" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" id="modal-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #e0e5f5;">
                <h5 class="fs-6 fw-bold text-primary mb-0">Add New Task</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         
        <div class="modal-body" style="background: rgba(255,255,255,0);">
            <div class="card shadow" style="margin-right: auto;margin-left: auto;width: auto;">
                <div class="card-body">
                    <p class="card-text"></p>
                    <form id="form1" action="{{url('/')}}/Add_Task" method="post">
                        @csrf

                        <select style="float:left" class="form-select  mb-5" name="choice">
            <option selected>Select Project</option>
            @foreach($project as $key)
            <option value="{{$key->Project_Name}}">{{$key->Project_Name}}</option>
            @endforeach
        </select>
                        <label class="form-label" style="font-weight: bold;">Task Name</label><span style="color: var(--bs-red);font-weight: bold;">*</span>
                        <input id="category" class="border rounded border-secondary form-control form-control-sm" type="text" placeholder="Task Name" name="task" autocomplete="on"  >
                        <span class="text-danger ">
               @error('task')

               {{$message}}
               @enderror
</br>
             </span>
                        <label class="form-label mt-2" style="font-weight: bold;">Task Priority</label><span style="color: var(--bs-red);font-weight: bold;">*</span>
                        <input id="category" class="border rounded border-secondary form-control form-control-sm" type="number" placeholder="Task Priority" name="priority" autocomplete="on" >
                        <span class="text-danger mt-2">
               @error('priority')

               {{$message}}
               @enderror

             </span>
                        <button id="myaddcat" class="btn btn-outline-dark btn-sm text-center border rounded-pill border-secondary float-end" type="submit" style="margin-right: auto;margin-left: auto;margin-top: 20px;font-weight: bold;" name="myaddcat">Add Task</button></form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- End: Add Task Modal -->



 <!-- Start: Edit Task Modal -->
<div class="modal fade" role="dialog" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" id="modal-2">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #e0e5f5;">
                <h5 class="fs-6 fw-bold text-primary mb-0">Edit Task</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body" style="background: rgba(255,255,255,0);">
            <div class="card shadow" style="margin-right: auto;margin-left: auto;width: auto;">
                <div class="card-body">
                    <p class="card-text"></p>
                    <form id="form1"
                    
                    @if(isset($task1))
                  
                    action="{{url('/update_task')}}/{{$task1->id}}"
                    
                    @endif  method="POST">
                        @csrf
                        <label class="form-label" style="font-weight: bold;">Task Name</label><span style="color: var(--bs-red);font-weight: bold;">*</span>
                        <input id="category" class="border rounded border-secondary form-control form-control-sm" type="text" placeholder="Task Name" name="Task_Name" autocomplete="on"  @if(isset($task1))
                        value="{{$task1->Task_Name}}"
                        @endif>
                       
                            
                        <label class="form-label" style="font-weight: bold;">Task Priority</label><span style="color: var(--bs-red);font-weight: bold;">*</span>
                        <input id="category" class="border rounded border-secondary form-control form-control-sm" type="number" placeholder="Task Priority" name="Task_Priority" autocomplete="on" @if(isset($task1))
                        value="{{$task1->Task_Priority}}"
                        @endif >
                        
                        <button id="myaddcat" class="btn btn-outline-dark btn-sm text-center border rounded-pill border-secondary float-end" type="submit" style="margin-right: auto;margin-left: auto;margin-top: 20px;font-weight: bold;" name="myaddcat">Edit Task</button></form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- End: Edit Task Modal -->
 
    