<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Models\Student;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function view()
    {
        $stdData = Student::latest()->simplePaginate(5);
        return view('students.index', [
            'data' => $stdData
        ]);
    }

    ///////////////////////////// ajax crud operation methods/////////////////////////////
    //ajax save
    public function saveData(Request $request){
        $validator = Validator::make($request->all(), [
            'stdName' => 'required|unique:students|max:255',
            'stdAddres' => 'required|unique:students|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status'=>400,
                    'errors'=>$validator->errors()
                
                ]                
            );
        }else{
            $student=new Student;
            $student->stdName=$request->input('stdName');
            $student->stdAddres=$request->input('stdAddres');
            $student->save();
            return response()->json(
                [
                    'status'=>200,
                    'success'=>"Data Saved Successfully!"
                
                ]                
            );

        }


    }
    //ajax show data

    public function fetchData(){
        $stdData = Student::latest()->get();
        return response()->json([
            'data'=>$stdData
        ]);
    }
    // ajax delete
    public function deleteData($id){
       $delete= Student::find($id);
       if($delete){
           $delete->delete();
           return response()->json([
               'status'=>200,
               'message'=>"Student Deleted Successfully"
           ]); 
        }else{
            return response()->json([
                'status'=>404,
                'message'=>"No Student Found!"
            ]);
       }       

    }
    

    ///////////////////////////// ajax crud operation methods ends/////////////////////////////





    // Simple crud operation methods
    public function insert()
    {
        return view('students.insert');
    }


    public function store(Request $request)
    {
        
        $request->validate([
            'stdName' => 'unique:students',
            'stdAddres' => 'unique:students'
        ],
        [
            'stdName.unique' => 'User name already exist',
            'stdAddres.unique' => 'User address already exist'
        ]);

        $std = new Student;
        $std->stdName = $request->stdName;
        $std->stdAddres = $request->stdAddres;
        $std->save();
        session()->flash('status', 'Student saved successfully! 👌');
        return redirect('/');
    }

    // Delete data

    public function delete(Request $request)
    {
        $id = $request->id;
        DB::table('students')->where('id', '=', $id)->delete();

        session()->flash('status', 'Student deleted successfully! 👌');
        return redirect('/');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data = DB::table('students')->distinct()->where('id', '=', $id)->get();
        $record = array();
        foreach ($data as $std) {
            $record[] = $std;
        }
        return view('students.update', [
            'data' => $record
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'stdName' => 'unique:students',
            'stdAddres' => 'unique:students'
        ],
        [
            'stdName.unique' => 'User name already exist',
            'stdAddres.unique' => 'User address already exist'
        ]);

        $id = $request->id;
        $name = $request->stdName;
        $address = $request->stdAddres;
        DB::table('students')->where('id', $id)->update(['stdName' => $name, 'stdAddres' => $address]);
        session()->flash('status', 'Record updated successfully! 👌');
        return redirect('/');
    }

}
