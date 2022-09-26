<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\school;
use Auth;
use PDF;
use Image;

class schoolcontroller extends Controller
{
    public function info(){
        return view('school.addstudent');
    }

    public function savestudent(Request $request){
        $data=$request->all();

    //calling model
    $model = new school;

    //getting values from input fields

    $model->name=$data['sname'];
    $model->fathername=$data['fname'];
    $model->age=$data['age'];
    $model->class=$data['cname'];
    $model->mark=$data['mark'];

    //image saving code
    if($request->hasFile('image')){
        //then get the file
    $img_tmp = $request->file('image');
    //checking extension of file
    $extension = $img_tmp->getClientOriginalExtension();
    //renaming file name
    $filename = rand(111,999999).'.'.$extension;
    //image path
    $img_path = 'upload/student'.$filename;
    //resizing image
    Image::make($img_tmp)->resize(120,120)->save($img_path);

    //assining database column 
    $model->image = $filename;
    }
    //saving data
    $model->save();
    //redirect to same page
    return redirect('/showstudent')->with('msg1','New Student Has Been Added To school');
    }

    //function for sohwing all students from database

    public function showstudent(){
        //getting all student data from databse
        $school = school::all();

        return view('school.showstudent',compact('school'));
    }
    //function for logging out admin
    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
    public function delete ($id){
        $model  = school::find($id);
        $model->delete();
        return redirect('/showstudent')->with('msg2','Student Data Has Been deleted');
    }

    //function for edit
    public function edit(Request $request, $id){
        if($request->isMethod('post')){
        $data = $request->all();

        //update data
        school::where(['id'=>$id])->update(['name'=>$data['sname'],'fathername'=>$data['fname'],'class'=>$data['cname'],'mark'=>$data['mark'],'age'=>$data['age']]);
        return redirect('/showstudent');
    }
        //getting data for updating
        $editstudent = school::where(['id'=>$id])->first();
        return view('school.editstudent',compact('editstudent'));
    }
    //pdf fucntion
    public function downloadPDF() {
        $show = school::all();
        $pdf = PDF::loadView('school.pdf', compact('show'));
        
        return $pdf->download('studentsdata.pdf');
}
}
