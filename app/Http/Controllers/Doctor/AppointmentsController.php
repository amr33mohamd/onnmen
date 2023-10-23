<?php 

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use Inertia\Inertia; 
use App\Http\Controllers\Controller;
use App\Services\AppointmentService;
class AppointmentsController extends Controller 
{
     /**
     * @var AppointmentService
     */
    protected $appointmentService;

    /**
     * PostController Constructor
     *
     * @param AppointmentService $appointmentService
     *
     */
    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }
    public function show() {
        return Inertia::render('Doctor/Appointments',['appointments'=>$this->appointmentService->getAppointmentsByDoctorId(auth()->user()->id)]);
    }
}