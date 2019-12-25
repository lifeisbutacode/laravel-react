<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class Todo extends Model
{
    public $timestamps = false;

    public function index() {

        $todo = DB::table('todos')
                ->get();
        $count = $todo->count();
    
        if($count > 0) {
            $response = array(
                'status' => 'SUCCESS',
                'body' => $todo
            );
        } else {
            $response = array(
                'status' => 'FAILED'
            );
        }
    
        return $response;
    }

    public function insertTodo($request)
    {
        if( $request->has(['todo_name', 'todo_description', 'todo_date']) ) {
            $data = array(
                'todo_name' => $request->todo_name,
                'todo_description' => $request->todo_description,
                'todo_date' => $request->todo_date,
                'created_at' => date('Y-m-d H:i:s'),
            );
            
            $todo = DB::table('todos')
                    ->insert($data);
            
            $response = array(
                'status' => "SUCCESS",
                'message' => "SUCCESS INSERTING"
            );

        } else {
            $response = array(
                'status' => "FAILED",
                'message' => "CHECK YOUR DATA"
            );
        
        }
     
        return $response;
    }

    public function viewTodoById($id)
    {

        $get = Todo::findOrFail($id);
        return $get;
    }

}
