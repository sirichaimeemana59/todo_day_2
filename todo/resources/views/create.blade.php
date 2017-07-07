@extends('layout.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                เพิ่มรายการ
            </h4>
        </div>
        <div class="panel-body">
            <form action="/store" method="post" role="form">
                {{csrf_field()}}
                {{--hidden แอบส่งค่า--}}
                <div class="form-group">
                    <label for="inputName">กรอกชื่อรายการ :: </label>
                    <input type="text" name="name" placeholder="ชื่อรายการ" class="form-control">
                </div>
                <div class="form-group">
                    <label for="selectCategory">เลือกหมวดหมู่ :: </label>
                    <select name="category_id" id="" class="form-control">
                        @foreach($categories as $category)//แสดงข้อมูลใน array
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach()
                    </select>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> บันทึก</button>
            </form>
        </div>
    </div>
@endsection()