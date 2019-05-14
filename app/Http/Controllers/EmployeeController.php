<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Employee;
use Yajra\Datatables\Datatables;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       
        return view('employee.index');
    }

    public function dt_ajax()
    {
        $employees = Employee::select(['id','firstname','lastname','email', 'mobile', 'address', 'position','base_sal'])
            ->take(10)->get();

        return Datatables::of($employees)
            ->editColumn('action', function($data){
                return "<button class='btn btn-info btn-sm'>show</button>";
            })
            ->make(true);
            // ->editColumn('purchase_name', function($data){
            //     return ucfirst($data->purchase_name);
            // })
    }

    public function store(Request $request)
    {
            $emp = new Employee;
            $emp->firstname = $request->firstname;
            $emp->lastname = $request->lastname;
            $emp->email = $request->email;
            $emp->mobile = $request->mobile;
            $emp->address = $request->address;
            $emp->position = $request->position;
            $emp->base_sal = $request->base_sal;
            $emp->save();
            return redirect()->back();
    }
    public function update(Request $request, $id)
    {
            $employee = Employee::findOrFail($id);
            $employee->firstname = $request->firstname;
            $employee->lastname = $request->lastname;
            $employee->email = $request->email;
            $employee->mobile = $request->mobile;
            $employee->address = $request->address;
            $employee->position = $request->position;
            $employee->base_sal = $request->base_sal;
            $employee->save();
            return json_encode($employee);
    }
    public function destroy(Request $request)
    {
        Employee::findOrFail($request->id)->delete();
        return response()->json(['success' => true]);
    }
}
