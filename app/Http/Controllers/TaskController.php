<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    // Start: function to add new Project
    public function add_project(Request $request)
    {
        session()->put('id2',10);//deine session id2
        
      $validate= $request->validate(

            [
                'project'=>'required',
                
            ]
            );  
            
            session()->forget('id2');//delete session id2

            $project=new Project();
            $project->Project_Name=$request['project'];
           
            $project->save();
            return redirect('/');

    }
   // End: function to add new Project
   
   
   
   // Start: function to display listing of   Project's Tasks
    public function index()
    {
        $task=Task::orderby('Task_Priority','asc')->get();
        $project=Project::all();
        $data=compact('task','project');
        return view('task')->with($data);

        
    }
    // End: function to display listing of   Project's Tasks

    
    // Start: function to add new  Project's Tasks
    public function AddTask(Request $request)
    {
        session()->put('id1',10);
        
      $validate= $request->validate(

            [
                'choice'=>'required',
                'task'=>'required',
                'priority'=>'required',
            ]
            );  
            
            session()->forget('id1');
            $project_name=$request['choice'];
            $project= Project::where('Project_Name',$project_name)->get();
              foreach($project as $item)
              {
                  $id=$item->id;
               }
             $task=new Task();
            $task->project_id=$id;
            $task->Task_Name=$request['task'];
            $task->Task_Priority=$request['priority'];
            $task->save();
            return redirect('/');

    }
      // End: function to add new  Project's Tasks

    

    
     // Start: function to Delete  Project's Task
    public function delete_task($id)
    {
        $task= Task::find($id);
        if(!is_null($task))
         {
            $task->delete();
         }      
         return redirect('/');
    }
// End: function to Delete  Project's Task

    // Start: function to open Edit Project's Task
    public function edit_task($id)
    {
         $task=Task::find($id);
      if(is_null($task))
         {
              //not found
              return redirect()->back();
         }
        else
         {
             //found
             $task=Task::all();
             $task1=Task::find($id);
             $data=compact('task','task1');
              return view('task')->with($data);
         }
    }
    // End: function to open Edit Project's Task

    
    // Start: function to update Edit Project's Task
    public function update_task($id, Request $req)
    {
          $task=Task::find($id);
          $task->Task_Name=$req->Task_Name;
          $task->Task_Priority=$req->Task_Priority;
          $task->save();
          return redirect('/');

     
    }

  // End: function to update Edit Project's Task

 // Start: function to display Tasks of selected Project from drop down list
    public function select_project(Request $req)
    {
        
        
        $project_name=$req['mychoice'];
        $project= Project::where('Project_Name',$project_name)->get();
              foreach($project as $item)
              {
                  $id=$item->id;
               } 

        $task=Task::where('project_id',$id)->orderby('Task_Priority','asc')->get();
        $project=Project::all();
        $data=compact('task','project');
        return view('task')->with($data);
    }

    // End: function to display Tasks of selected Project from drop down list
}
