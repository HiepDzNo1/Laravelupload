<?php

namespace App\Http\Service;

use App\Models\Lop;
use PHPUnit\Exception;

class LopService
{
    public function create($request){
        try {
            Lop::create([
                'malop'=>$request->input('malop'),
                'tenlop'=>$request->input('tenlop'),
                'mota'=>$request->input('mota'),
                'soluongsv'=>$request->input('soluongsv'),
            ]);
            Session()->flash('success','Thêm mới lớp học thành công');

        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
        return true;
    }
    public function getAll(){
        return Lop::paginate(3);
    }
    public function edit($lop, $request){
        try {
//            $lop->malop = $request->input('malop');
            $lop->tenlop = $request->input('tenlop');
            $lop->mota = $request->input('mota');
            $lop->soluongsv = $request->input('soluongsv');
            $lop->save();
            Session()->flash('success','Chỉnh sửa lớp học thành công');
            return true;
        }
        catch (Exception $ex){
            Session()->flash('error','Chỉnh sửa lớp học KHÔNG thành công');
        }
        return false;
    }
    public function delete($request){
        $lop = Lop::where('id',$request->input('id'))->first();
        if($lop){
            return $lop->delete();
        }
    }
}
