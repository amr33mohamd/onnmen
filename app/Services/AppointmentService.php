<?php


namespace App\Services;

use App\Models\User;
use App\Repositories\AppointmentRepository;


class AppointmentService
{
    /**
     * @var $appointmentRepository
     
     */
    protected $appointmentRepository;

    /**
     * PostService constructor.
     *
     * @param AppointmentRepository $appointmentRepository
     */
    public function __construct(AppointmentRepository $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    public function getAllAppointments()    
    {
        return $this->appointmentRepository->getAllAppointments();
    }

    public function getAppointmentById($id)
    {
         return $this->appointmentRepository->getAppointmentById($id);
    }

    public function deleteAppointment($id)
    {
        return $this->appointmentRepository->deleteAppointment($id);

    }

    public function createAppointment(array $appointmentDetails)
    {
        return $this->appointmentRepository->createAppointment($appointmentDetails);
    }
    
    public function updateAppointment($id, array $newDetails)
    {
       return $this->appointmentRepository->updateAppointment($id,$newDetails);

    }

    public function getAppointmentsByPatientId($id)
    {
        return $this->appointmentRepository->getAppointmentsByPatientId($id);
    }

}
    