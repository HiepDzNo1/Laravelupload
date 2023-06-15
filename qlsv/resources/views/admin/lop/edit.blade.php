@extends('admin.main')
@section('content')
    <form action="/admin/lop/edit/{{$lop->id}}" method="post">
        @include('share.error')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã lớp học</label>
                <input readonly type="text" value="{{$lop->malop}}" name="malop" class="form-control" id="malop" placeholder="Nhập mã lớp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tên lớp</label>
                <input type="text" value="{{$lop->tenlop}}" name="tenlop" class="form-control" id="tenlop" placeholder="Nhập tên lớp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mô tả</label>
                <input type="text" value="{{$lop->mota}}" name="mota" class="form-control" id="mota" placeholder="Nhập mô tả">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Số lượng sv</label>
                <input type="number" value="{{$lop->soluongsv}}" name="soluongsv" class="form-control" id="soluongsv" placeholder="Nhập số lượng sinh viên">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        @csrf
    </form>
@endsection
