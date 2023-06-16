<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Service\LopService;
use App\Models\Lop;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFormRequest;
use Illuminate\Support\Facades\DB;

class LopController extends Controller
{
    //
    protected $lopService;
    public function __construct(LopService $lopService)
    {
        $this->lopService = $lopService;
    }

    public function create(){
        return view('admin.lop.add',[
            'title'=>'Thêm mới lớp học'
        ]);
    }
    public function postcreate(CreateFormRequest $request){
       //dd($request->input());
        $result = $this->lopService->create($request);
        return redirect()->back();
    }
    public function list(){
        // dd($this->lopService->getAll());
        return view('admin.lop.list',[
            'title'=>'Danh sách lớp học',
            'lops'=>$this->lopService->getAll()
        ]);
    }
    public function edit(Lop $lop){
        return view('admin.lop.edit',[
            'title'=>'Chỉnh sửa thông tin lớp học',
            'lop'=>$lop
        ]);
    }
    public function postedit(Lop $lop, Request $request){
        $result = $this->lopService->edit($lop, $request);
        return redirect()->back();
    }
    public function delete(Request $request){
        $result = $this->lopService->delete($request);
        if($result){
            return response()->json([
                'error'=>'false',
                'message'=>'Xóa lớp thành công'
            ]);
        }
        return response()->json([
            'error'=>'true',
            'message'=>'Xóa lớp KHÔNG thành công'

        ]);
    }

//tim kiem
    public function searchFullText(Request $request) {
        if(empty($request->typeSearch)) {
            return redirect()->route("listClass");
        } else {
            if($request->typeSearch == 'tenlop'){
                $data = DB::table('lops')->where('tenlop', 'LIKE', "%{$request->textSearch}%")->paginate(1);
                return view('admin.lop.list',[
                    'title'=>'Tìm kiếm theo tên',
                    'lops'=>$data
                ]);
            } else if($request->typeSearch == 'malop'){
                $data = DB::table('lops')->where('malop', '=', $request->textSearch)->paginate(1);
                return view('admin.lop.list',[
                    'title'=>'Tìm kiếm theo mã',
                    'lops'=>$data
                ]);
            } else {
                return redirect()->route("listClass");
            }
        }
    }


    //sap xep
    public function sapXep(Request $request) {
        if(empty($request->typeSapXep)) {
            return redirect()->route("listClass");
        }else {
            if($request->typeSapXep == "malop"){
                $lops = DB::table('lops')->orderBy('malop','desc')->paginate(3);
                return view('admin.lop.list',[
                    'title'=>'Danh sách lớp học sắp xêp',
                    'lops'=>$lops
                ]);
            }
            else if($request->typeSapXep == "tenlop"){
                $lops = DB::table('lops')->orderBy('tenlop','asc')->paginate(3);
                return view('admin.lop.list',[
                    'title'=>'Danh sách lớp học sắp xêp',
                    'lops'=>$lops
                ]);
            }
        }

    }



}
