<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Employee;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index')->withEmployees($employees);
    }
    public function store(Request $request)
    {
        // commented this for purpose
        // $rules = [
        //     'firstname' => 'required|alpha',
        //     'lastname' => 'required|alpha',
        //     'email' => 'required|unique:employees',
        //     'mobile' => 'required|',
        //     'address' => 'required',
        //     'position' => 'required', 
        //     'base_sal' => 'required' 
        // ];
        // $validator = Validator::make (Input::all(),$rules);
        // if ($validator->fails())
        //     return json_encode(['error' => 'Invalid inputs'], 400);
        // else {
            $emp = new Employee;
            $emp->firstname = $request->firstname;
            $emp->lastname = $request->lastname;
            $emp->email = $request->email;
            $emp->mobile = $request->mobile;
            $emp->address = $request->address;
            $emp->position = $request->position;
            $emp->base_sal = $request->base_sal;
            $emp->save();
            return json_encode($emp);
        // }
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
