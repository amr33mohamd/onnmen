<?php

namespace App\Admin\Controllers;

use App\Models\Appointment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AppointmentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Appointment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Appointment());

        $grid->column('id', __('Id'));
        $grid->column('patient_id', __('Patient id'));
        $grid->column('doctor_id', __('Doctor id'));
        $grid->column('appointment_date', __('Appointment date'));
        $grid->column('status', __('Status'));
        $grid->column('reason', __('Reason'));
        $grid->column('prescription', __('Prescription'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Appointment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('patient_id', __('Patient id'));
        $show->field('doctor_id', __('Doctor id'));
        $show->field('appointment_date', __('Appointment date'));
        $show->field('status', __('Status'));
        $show->field('reason', __('Reason'));
        $show->field('prescription', __('Prescription'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Appointment());

        $form->number('patient_id', __('Patient id'));
        $form->number('doctor_id', __('Doctor id'));
        $form->textarea('appointment_date', __('Appointment date'));
        $form->text('status', __('Status'))->default('pending');
        $form->text('reason', __('Reason'));
        $form->text('prescription', __('Prescription'));

        return $form;
    }
}
