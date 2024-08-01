<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function getEmployee()
    {
        try {
            $user = Auth::user(); // Get the currently authenticated user
            if (!$user) {
                return response()->json(['error' => 'User not authenticated'], 401);
            }
    
            $employee = Employee::where('empid', $user->empid)->first(); // Fetch employee using empid
            if (!$employee) {
                return response()->json(['error' => 'Employee not found'], 404);
            }
    
            $fullName = $employee->emp_lname . ', ' . $employee->emp_fname . ' ' . $employee->emp_mname;
            $empPosition = $employee->emp_position;
            return response()->json(['fullName' => $fullName, 'empPosition' => $empPosition]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}