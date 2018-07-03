<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portofolio;

class AdminController extends Controller
{
    public function dashboard(){
        return view("dashboard");
    }
    public function portofolio(){
        $portofolio = Portofolio::get();
        return view("portofolio",["resource"=>$portofolio]);
    }
    public function create_portofolio(Request $request){
        function gambar($data){
            $image = $data;
            $newname = time().'.'.$image->getClientOriginalExtension();
            $destinasi = public_path("/img");
            $image->move($destinasi,$newname);
            return $newname;
        }        
        $portofolio = new Portofolio;
        $portofolio->judul=$request->judul;
        $newname = gambar($request->img);
        $portofolio->img="img/".$newname;
        $portofolio->deskripsi=$request->deskripsi;
        $portofolio->link=$request->link;
        $portofolio->status=1;
        if($portofolio->save()){
            return redirect("/admin/portofolio")->with("sukses","Berhasil Menambahkan Data Portofolio!");
        }else{
            return redirect("/admin/portofolio")->with("gagal","Gagal Menambah Data Portofolio!");
        }
        
    }
    public function delete_portofolio($id){
        $portofolio = Portofolio::find($id);
        $portofolio->delete();
        return redirect("/admin/portofolio")->with("sukses","Berhasil Menghapus Data Portofolio");        
    }
    public function update(Request $request,$id){
        function gambar($data){
            $image = $data;
            $newname = time().'.'.$image->getClientOriginalExtension();
            $destinasi = public_path("/img");
            $image->move($destinasi,$newname);
            return $newname;
        }
        $portofolio = Portofolio::find($id);
        $portofolio->judul = $request->judul;
        $portofolio->img = gambar($request->img);
    }

}
