<?php

namespace App\Http\Controllers;

use App\Models\EmpAcc;
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
    
            $fullName = $employee->emp_lname . ', ' . $employee->emp_fname . ' ' . $employee->emp_mname . ' ' . $employee->emp_ext;
            $empPosition = $employee->emp_position;
            return response()->json(['fullName' => $fullName, 'empPosition' => $empPosition]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getPersonalInfo()
    {
        try {
            $user = Auth::user(); // Get the currently authenticated user
            if (!$user) {
                return response()->json(['error' => 'User not authenticated'], 401);
            }
    
            $employee = Employee::where('empid', $user->empid)->first(); // Fetch employee using empid
            $emp_acc= EmpAcc::where('empid', $user->empid)->first(); 
            if (!$employee) {
                return response()->json(['error' => 'Employee not found'], 404);
            }
    
            $empUser = $emp_acc->empuser;
            $empID = $emp_acc->empid;
            $firstName = $employee->emp_fname;
            $middleName = $employee->emp_mname;
            $lastName = $employee->emp_lname;
            $suffix = $employee->emp_ext;
            $citizenship = $employee->emp_citizen;
            $birthday = $employee->emp_dob;
            $placeOfBirth = $employee->emp_pob;
            $sex = $employee->emp_sex;
            $civilStatus = $employee->emp_religion;
            $height = $employee->emp_height;
            $weight = $employee->emp_weight;
            $bloodType = $employee->emp_blood;
            return response()->json(['empUser' => $empUser,'empID' => $empID, 'firstName' => $firstName, 'middleName' => $middleName, 'lastName' => $lastName
            , 'suffix' => $suffix, 'citizenship' => $citizenship, 'birthday' => $birthday, 'placeOfBirth' => $placeOfBirth
            , 'sex' => $sex, 'civilStatus' => $civilStatus, 'height' => $height, 'weight' => $weight
            , 'bloodType' => $bloodType]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getSecurityandContact()
    {
        try {
            $user = Auth::user(); // Get the currently authenticated user
            if (!$user) {
                return response()->json(['error' => 'User not authenticated'], 401);
            }
    
            $employee = Employee::where('empid', $user->empid)->first(); // Fetch employee using empid
            $emp_acc= EmpAcc::where('empid', $user->empid)->first(); 
            if (!$employee) {
                return response()->json(['error' => 'Employee not found'], 404);
            }
    
            $mobilenum = $employee->emp_cnum;
            $telnum = $employee->emp_telnum;
            $emailadd = $emp_acc->empmail;
            $pass = $emp_acc->emppass;
            return response()->json(['mobilenum' => $mobilenum, 'telnum' => $telnum, 'emailadd' => $emailadd
            , 'pass' => $pass]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}