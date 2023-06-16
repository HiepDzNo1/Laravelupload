@extends('admin.main')
@section('content')
<!-- tim kiem -->
                <div class="col-md-6">
                    <form class="d-flex" action="{{route('searchFullText')}}" method="GET">
                        @csrf
                        <select class="form-select mx-2" aria-label="select example" name="typeSearch">
                            <option value="">Chon truong tim kiem</option>
                            <option value="malop">Mã Lớp</option>
                            <option value="tenlop">Tên Lớp</option>
                        </select>
                        <input class="form-control me-2" name="textSearch" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        <!-- </div> -->
      <!-- sap xep -->
      <!-- <div class="card"> -->
            <div class="card-header d-flex justify-content-between">
                <div class="col-md-4">
                    <form class="d-flex " action="{{route('sapXep')}}" method="get">
                        @csrf
                        <select  style="width: 60% " class="form-select mx-2" aria-label="select example" name="typeSapXep">
                            <option value="">Sap xep</option>
                            <option value="malop">Mã Lớp</option>
                            <option value="tenlop">Tên Lớp</option>
                        </select>
                        <button style="width: 30% " class="btn btn-outline-primary" type="submit">Sap xep</button>
                    </form>
                </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã lớp</th>
                <th>Tên lớp</th>
                <th>Mô tả</th>
                <th>Số lượng sv</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lops as $lop)
                <tr>
                    <td>{{$lop->id}}</td>
                    <td>{{$lop->malop}}</td>
                    <td>{{$lop->tenlop}}</td>
                    <td>{{$lop->mota}}</td>
                    <td>{{$lop->soluongsv}}</td>
                    <td>
                        <a href="/admin/lop/edit/{{$lop->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="{{route('deleteClass',['lop'=>$lop->id])}}" ><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $lops->links() }}
@endsection
