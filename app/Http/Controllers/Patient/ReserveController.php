<?php 

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use Inertia\Inertia; 
use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Services\AppointmentService;
class ReserveController extends Controller 
{
     /**
     * @var userService
     */
    protected $userService;
    /**
     * @var appointmentService
     */
    protected $appointmentService;

    /**
     * PostController Constructor
     *
     * @param UserService $userService
     *
     */
    public function __construct(UserService $userService,AppointmentService $appointmentService)
    {
        $this->userService = $userService;
        $this->appointmentService = $appointmentService;
    }
    
    public function show($id) {
        return Inertia::render('Patient/Reserve',[
            'doctor'=>$this->userService->getUserById($id),
            'appointments'=>$this->userService->appointmentsDates($id)
            ]);
    }
 
    //reserve appointment function
    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date|after:today',
            'reason' => 'required',
        ]);
        $validated['patient_id'] = auth()->user()->id;
        $this->appointmentService->createAppointment($validated);
        return redirect()->route('appointments')->with('success','Appointment Reserved Successfully.');
    }
}