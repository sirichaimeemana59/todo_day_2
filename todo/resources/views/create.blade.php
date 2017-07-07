@extends('layout.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                เพิ่มรายการ
            </h4>
        </div>
        <div class="panel-body">


            @if ($errors->any())
                <div class="alert alert-danger">
                    <h2>เกิดข้อผิดพลาดขนาดเพิ่มข้อมูลดังนี้ :: </h2>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            {{--แจ้งเตือนว่ามี error อะไรบ้าง--}}
            {{--@if($errors->all())--}}
            {{--@foreach($errors as $error)--}}
            {{--{{$error}}--}}
            {{--@endforeach--}}
            {{--@endif--}}


            <form action="/store" method="post" role="form">
                {{csrf_field()}}
                {{--hidden แอบส่งค่า--}}
                <div class="form-group">
                    <label for="inputName">กรอกชื่อรายการ :: </label>
                    <input type="text" name="name" placeholder="ชื่อรายการ" class="form-control"
                           value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="selectCategory">เลือกหมวดหมู่ :: </label>
                    <select name="category_id" id="" class="form-control">
                        @foreach($categories as $category)//แสดงข้อมูลใน array
                        <option value="{{$category->id}}"
                                @if($category->id == old('category_id')) selected @endif >{{$category->name}}</option>
                        {{--@if($category->id==old('category_id')) selected@endif--}}
                        {{--คำสั่ง if--}}

                        @endforeach()
                    </select>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> บันทึก</button>
            </form>
        </div>
    </div>
@endsection()