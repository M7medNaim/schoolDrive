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

        // active student
        $activeStudentsCount = Student::where('student_status', 'active')->count();

        
        return response()->view('cms.home', compact('studentCount', 'trainerCount', 'employeeCount', 'carCount', 'successFraction', 'passedStudents' ,'activeStudentsCount'));
    }

    // notifications
    public function notifications()
    {
        $user = auth()->user();

        $notifications = $user->notifications;

        dispatch(function () use ($notifications) {
            $notifications->markAsRead();
        })->afterResponse();

        return view('cms.notifications', compact('notifications'));
    }


    public function getUnReadNotification()
    {
        $user = auth()->user();

        $notifications = $user->unreadNotifications;

        // dispatch(function() use ($notifications) {
        //     $notifications->markAsRead();
        // })->afterResponse();


        return response()->json([
            'notifications' => $notifications,
        ]);
    }
}
