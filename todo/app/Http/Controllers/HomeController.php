<?php

namespace App\Http\Controllers;

use App\categories;
use App\Todo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function create()
    {
        $data = [
            'categories' => categories::all()
        ];
        return view('create', $data);
    }
    public function store(Request $request){
        //dd($request->all());
        $todo = new Todo();
        $todo->name = $request->input('name');
        $todo->category_id = $request->input('category_id');
        $todo->save();

///////////////////////////////////////////////////////////////
        //รับค่าที่ส่งมาจากฟอร์ม
//        $todo = new Todo();
//        $todo->name = $request->input('name');
//        $todo->category_id = $request->input('category_id');
//        $todo->save();


        return redirect('/');
    }

    public function edit($id){
        //
        return view('edit');
    }

    public function update(Request $request, $id){
        //
        return redirect('/');
    }

}