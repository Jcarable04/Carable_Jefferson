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
    // Current page
    $page = isset($_GET['page']) && !empty($_GET['page']) ? $this->io->get('page') : 1;

    // Search query
    $q = isset($_GET['q']) && !empty($_GET['q']) ? trim($this->io->get('q')) : '';

    $records_per_page = 10;

    // Load pagination library
    $this->call->library('pagination');

    // Get paginated data
    $students = $this->StudentsModel->page($q, $records_per_page, $page);

    $data['students'] = $students['records'];

    $total_rows = $students['total_rows'];

    // Pagination settings
    $this->pagination->set_options([
        'first_link' => '⏮ First',
        'last_link'  => 'Last ⏭',
        'next_link'  => 'Next →',
        'prev_link'  => '← Prev',
        'page_delimiter' => '&page='
    ]);

    $this->pagination->set_theme('bootstrap');
    $this->pagination->initialize($total_rows, $records_per_page, $page, 'students?q=' . $q);

    $data['page'] = $this->pagination->paginate();

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