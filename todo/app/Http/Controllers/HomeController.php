<?php

namespace App\Http\Controllers;

use App\categories;
use App\Todo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
//        $todos = Todo::where('name','หมอ')->get(); การ select
//            $todos = Todo::orderBy('id', 'desc')->get();
        $todos = Todo::paginate(5);
        $data = [
            'todos' => $todos//ต้องเหมือนกันทั้ง 2 ค่า 'todos' => $todos
        ];
        return view('index', $data);
    }

    public function toggle($id,$status){

        $todo = Todo::findOrFail($id);

        $todo->status = $status;
        $todo->save();
        return redirect('/');
    }



    public function create()
    {
        $data = [
            'categories' => categories::all()
        ];
        return view('create', $data);
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $rules = [
            'name' => 'required|min:3',
            'category_id' => 'required'
            //แจ้งข้อความแจ้งเตือนเวลาไม่ได้กรอกข้อมูล
        ];
        $this->validate($request, $rules);//ส่งค่าเข้าไปและถาม
        $todo = new Todo();
        $todo->name = $request->input('name');
        $todo->category_id = $request->input('category_id');
        $todo->status = 0;
        $todo->save();


///////////////////////////////////////////////////////////////
        //รับค่าที่ส่งมาจากฟอร์ม ลงในฐานข้อมูล
//        $todo = new Todo();
//        $todo->name = $request->input('name');
//        $todo->category_id = $request->input('category_id');
//        $todo->save();


        return redirect('/');
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        $data = [
            'categories' => categories::all(),
            'todo' => $todo
        ];
        return view('edit', $data);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'category_id' => 'required'
            //แจ้งข้อความแจ้งเตือนเวลาไม่ได้กรอกข้อมูล
        ];
        $this->validate($request, $rules);//ส่งค่าเข้าไปและถาม
        //dd($request->all());
        $todo = Todo::findOrFail($id);
        $todo->name = $request->input('name');
        $todo->category_id = $request->input('category_id');
        $todo->save();
        return redirect('/');
    }
    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete($id);
        return redirect('/');
    }

}