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
    public function sapxep(Request $request)
{
    $sinhviens = DB::table('lops');

    if ($request->has('sort') && $request->sort == 'malop') {
        $sinhviens->orderBy('malop');
    }

    $sinhviens = $sinhviens->get();

    return view(
        'list', compact('sinhviens')
    );
}
}
