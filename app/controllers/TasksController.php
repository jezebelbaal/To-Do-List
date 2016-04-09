<?php 

class TasksController extends BaseController {
	
	

	//list as tarefas existentes
	public static function listTasks()
	{

		$tasks = Task::all();
		$data['tasks'] = $tasks;
		return View::make('tasks/list', $data);
	}
	

	//cria uma nova tarefa
	public function create(){

		return View::make('tasks/create');

	}

	public function insert(){

		$task = new Task; 
		$task->title = Input::get('tasktitle');
		$task->deadline = Input::get('deadline');
		$task->created_at = date("Y-m-d H:i:s");
		$task->status = false;

		$task->save();

		return Redirect::action('TasksController@listTasks');
	}

	//apaga uma tarefa;
	public function delete(){

		$taskid = Input::get('id');
		$task = Task::find($taskid);
		$task->delete();

		return Redirect::action('TasksController@listTasks');
	}

	//marca uma tarefa como feita
	public function done(){

		$taskid = Input::get('id');
		$task = Task::find($taskid);
		$task->status = true;

		$task->save();

		return Redirect::action('TasksController@listTasks');
	}

	

}

?>