<?php
namespace app\controllers;
use app\model\ToDo;

class HomeController extends BaseController {
	public function show()
	{
		$toDo = new ToDo();
		$parameters['items'] = $toDo::all()->orderBy('id desc');
		$this->view->render('show.latte.php', $parameters);

	}

	public function migrate()
	{
		$migrator = new \Pheasant\Migrate\Migrator();
        $migrator->initialize(ToDo::schema());
	}

	public function create()
	{
		$toDo = new ToDo();
		$toDo->title = $_GET['title'];
		$toDo->status = $_GET['status'];
		if ($toDo->save()) {
			echo json_encode(['code' => 200]);
		} else {
			echo json_encode(['code' => -100]);
		}
	}

	public function delete()
	{
		$toDo = new ToDo();
		$info = $toDo::byId($_GET['id']);
		if ($info->delete()) {
			echo json_encode(['code' => 200]);
		} else {
			echo json_encode(['code' => -100]);
		}
	}


	public function showAll(){
        $todos = ToDo::byId(1);
        print_r($todos->title);exit;
        foreach ($todos as $todo){
            echo $todo->title;
        }

    }
}