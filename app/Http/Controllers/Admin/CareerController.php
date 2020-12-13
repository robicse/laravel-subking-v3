<?php

namespace App\Http\Controllers\Admin;

use App\Career;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::latest()->get();
        return view('backend.admin.career.index', compact('careers'));
    }

    public function create()
    {
        return view('backend.admin.career.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'deadline' => 'required',
            'detail' => 'required',
        ]);

        $career = new Career();
        $career->title = $request->title;
        $career->slug = Str::slug($request->title);
        $career->education = $request->education;
        $career->experience = $request->experience;
        $career->deadline = $request->deadline;
        $career->detail = $request->detail;
        $career->save();

        Toastr::success('Career Created Successfully');
        return redirect()->route('admin.career.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $career = Career::find($id);
        return view('backend.admin.career.edit', compact('career'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'deadline' => 'required',
            'detail' => 'required',
        ]);

        $career = Career::find($id);
        $career->title = $request->title;
        $career->slug = Str::slug($request->title);
        $career->education = $request->education;
        $career->experience = $request->experience;
        $career->deadline = $request->deadline;
        $career->detail = $request->detail;
        $career->save();

        Toastr::success('Career Updated Successfully');
        return redirect()->route('admin.career.index');
    }

    public function destroy($id)
    {
        Career::destroy($id);
        Toastr::success('Career Deleted Successfully');
        return redirect()->route('admin.career.index');
    }
}
