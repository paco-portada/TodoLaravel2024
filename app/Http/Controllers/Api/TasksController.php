<?php
   
namespace App\Http\Controllers\Api;
   
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Validator;
use App\Models\Task;
use App\Http\Resources\Task as TaskResource;
   
class TasksController extends BaseController
{

    public function index()
    {
        $tasks = Task::where('user_id', auth()->user()->id)
               ->get();
        return $this->sendResponse(TaskResource::collection($tasks), 'Tasks fetched.');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'description' => 'required'
        ]);
        
        if ($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        
        $task = new Task();
        $task->description = $request->description;
        $task->user_id = auth()->user()->id;
        $task->save();
        
        return $this->sendResponse(new TaskResource($task), 'Task created.');
    }

   
    public function show($id)
    {
        $task = Task::find($id);
        
        if (is_null($task)) {
            return $this->sendError('Task does not exist.');
        }
        return $this->sendResponse(new TaskResource($task), 'Task fetched.');
    }
    

    public function update(Request $request, Task $task)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'description' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $task->description = $input['description'];
        //$task->description = $request->description;
        $task->save();
        
        return $this->sendResponse(new TaskResource($task), 'Task updated.');
    }
   
    public function destroy($id)
    {
        $task = Task::find($id);
        if (is_null($task)) {
            return $this->sendError('Task does not exist.', 'Task NOT deleted.');
        }
        else {
            $task->delete();
            return $this->sendResponse([], 'Task deleted.');
        }
    }
}