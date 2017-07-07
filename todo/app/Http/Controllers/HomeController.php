<?php

namespace App\Http\Controllers;

use App\categories;
use App\Todo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        $data = [
            'todos' => $todos//ต้องเหมือนกันทั้ง 2 ค่า 'todos' => $todos
        ];
        return view('index',$data);
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
        $this->validate($request,$rules);//ส่งค่าเข้าไปและถาม
        $todo = new Todo();
        $todo->name = $request->input('name');
        $todo->category_id = $request->input('category_id');
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
        //
        return view('edit');
    }

    public function update(Request $request, $id)
    {
        //
        return redirect('/');
    }

}