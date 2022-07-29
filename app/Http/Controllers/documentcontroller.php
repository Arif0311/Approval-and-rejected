<?php

namespace App\Http\Controllers;

use App\Models\document;
use Illuminate\Http\Request;

class documentcontroller extends Controller
{
    public function index()
    {
        
        $datas = document::all();
        return view('document', compact('datas'));

        // $data['document'] = document::all();
        // return view('document')->with(['document'=>$data['document']]);;
       
    }

    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'document_no' => 'required',
        //     'document_subject' => 'required',
        //     'status' => 'required',
        //     'remark' => 'required',
        //     'update_by' => 'required',
        //     'created_by' => 'required'
        // ]);
        document::create([
            'document_no' => $request->document_no,
            'document_subject' => $request->document_subject,
            'status' => $request->status,
            'remark' => $request->remark,
            'update_by' => $request->update_by,
            'created_by' => $request->created_by,
        ]);
        return redirect('/document');
    }

    public function approved($id)
    {
        $data = document::find($id);
        $data->status = 'approved';
        $data->save();
        return redirect()->back();
    }

    public function reject($id)
    {
        $data = document::find($id);
        $data->status = 'rejected';
        $data->save();
        return redirect()->back();
    }

    public function Dashboard()
    {
        return view('dashboard');
    }
}
