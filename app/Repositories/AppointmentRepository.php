<?php
namespace App\Repositories;
use App\Models\Appointment;
class AppointmentRepository
{
   
    /**
     * AppointmentRepositery constructor.
     *
     * @param Appointment $appointment
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function getAllAppointments()
    {
        return $this->appointment->paginate();
    }

    public function getAppointmentById($id)
    {
        return Appointment::findOrFail($id);
    }

    public function deleteAppointment($id){
        return Appointment::destroy($id);
    }

    public function createAppointment(array $appointmentDetails)
    {
        return Appointment::create($appointmentDetails);
    }
    public function updateAppointment($id, array $newDetails)
    {
           $appointment =  Appointment::where('id',$id)->first();
           $appointment->update($newDetails);
           return $appointment;
    }

    public function getAppointmentsByPatientId($id)
    {
        return Appointment::where('patient_id',$id)->get();
    }

}


    


