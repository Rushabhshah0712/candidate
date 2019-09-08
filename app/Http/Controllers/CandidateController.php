<?php

namespace App\Http\Controllers;

use App\candidate;
use App\Imports\excelImport;
use Excel;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DataTables;

class CandidateController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // return 150;
            $data = candidate::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                    $edit = '<a  class="btn-primary btn-sm edit" style="color: white" id="'.$row->id.'" >Edit</a>';
                    $delete ='<a href="candidate/'.$row->id.'/delete"  class="edit btn3d btn-danger btn-sm">Delete</a>';
                        return $edit.$delete;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('usingdatatable');
    }

    public function importExport()
    {
        $data = candidate::all();
        return view('importExport', ['data' => $data]);
    }

    public function downloadExcel($type)
    {
        $data = candidate::get()->toArray();
        Excel::download / Excel::store($data);

        return Excel::create('itsolutionstuff_example', function ($excel) use ($data) {
            $excel->sheet('mySheet', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'import_file' => 'required',
        ]);

        Excel::import(new excelImport, request()->file('import_file'));

        return back()->with('success', 'Insert Record successfully.');
    }

    public function getalldata()
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $data = candidate::where('id', '=', $id)->get();
            return $data;
        }
    }
    public function update(Request $request)
    {
        $id = (int) $request->id;
        $data = candidate::findOrFail($id);
        $data['full_name'] = $request->full_name;
        $data['email'] = $request->email;
        $data['contect_number'] = $request->contect_number;
        $data['gender'] = $request->gender;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['higher_aducation'] = $request->higher_aducation;
        if ($data->update()) {
            return back()->with('success', 'update Record successfully.');
        }

    }

    public function destroy($id)
    {
        $data = candidate::where('id', '=', $id)->delete();
        if($data === 1){
            return back()->with('success', 'Delete Record successfully.');
        }
        else{
            return back()->with('error', 'somthing wont wrong');
        }
    }
    public function delete($id){
        // return 150;
        $data = candidate::withTrashed()->findOrFail($id);
        if(!$data->trashed()){
            $data->delete();
            return back()->with('success', 'Delete Record successfully.');
          }
          else {
            $data->forceDelete();
          }
          return back();
       
    }
}
