<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Employee;
use App\Models\Student;
use App\Models\Trainer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $studentCount = Student::count();
        $trainerCount = Trainer::count();
        $employeeCount = Employee::count();
        $carCount = Car::count();
        // successPercentage student 
        $totalStudents = Student::where('result', '!=', 'لم يقدم')->count();
        $passedStudents = Student::where('result', '=', 'ناجح')->count();
        if ($totalStudents > 0) {
            $successPercentage = ($passedStudents / $totalStudents) * 100;
        } else {
            $successPercentage = 0;
        }
        $successFraction = number_format($successPercentage, 2);
        return response()->view('cms.home', compact('studentCount', 'trainerCount', 'employeeCount', 'carCount', 'successFraction'));
    }
}
