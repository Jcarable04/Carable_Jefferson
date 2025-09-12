<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

/**
 * Controller: StudentsController
 * 
 * Automatically generated via CLI.
 */
class StudentsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('StudentsModel');
    }
    public function get_all()
    {
        $data = $this->StudentsModel->all();
        $this->call->view('students/students_data', $data);
    }
    public function create()
    {
        
        if ($this->io->method() == 'post') {
            $fname = $this->io->post('first_name');
            $lname = $this->io->post('last_name');
            $email = $this->io->post('email');

            $data = [
                'first_name' => $fname,
                'last_name' => $lname,
                'email' => $email
            ];

            $this->StudentsModel->insert($data);
             echo "<p>Student created successfully!</p> <a href='" . site_url('/') . "'>View Data</a>";
        }else {
            $this->call->view('students/create_new');
        }


    }
    public function update($id)
    {
        if ($this->io->method() == 'post') {
            $fname = $this->io->post('first_name');
            $lname = $this->io->post('last_name');
            $email = $this->io->post('email');
            $newdata = [
                'first_name'=> $fname,
                'last_name'=> $lname,
                'email' => $email
                ];

            $this->StudentsModel->update($id, $newdata);
            echo "<p>Updated successfully!</p> <a href='" . site_url('/') . "'>View Data</a>";
        }else {
            $data = $this->StudentsModel->find($id);
            $this->call->view('students/update_student', $data);
        }
    }
    public function delete($id)
    {
        $this->StudentsModel->delete($id);
        echo "<p>Deleted successfully!</p> <a href='" . base_url() . "/" . "'>View Data</a>";
    }
}