<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo;
        $response = $todo->index();
        return $response;
    }

    public function insertTodo(Request $request)
    {
        $todo = new Todo;
        $response = $todo->insertTodo($request);
        return $response;
    }

    public function viewTodoById(Request $request) {
        $todo = new Todo;
        $id = $request->route('id');
        $response = $todo->viewTodoById($id);
        return $response;
    }
    
}
