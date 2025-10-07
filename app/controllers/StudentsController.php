<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class StudentsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('StudentsModel');
        $this->call->library('session');
    }

    // ✅ AUTH GUARD
    private function requireLogin()
    {
        if (!$this->session->has_userdata('student_id')) {
            redirect('students/login');
            exit;
        }
    }

    // ✅ LOGIN
    public function login()
    {
        if ($this->io->method() === 'post') {
            $lname = $this->io->post('last_name');
            $fname = $this->io->post('first_name');
            $password = $this->io->post('password');

            $student = $this->StudentsModel->getByName($lname, $fname);

            if ($student && password_verify($password, $student['password'])) {
                $this->session->set_userdata('student_id', $student['id']);
                $this->session->set_userdata('student_name', $student['first_name'] . ' ' . $student['last_name']);
                $this->session->set_userdata('role', $student['role']);
                redirect('students');
            } else {
                $data['error'] = "Invalid credentials!";
                $this->call->view('students/login', $data);
            }
        } else {
            $this->call->view('students/login');
        }
    }

    // ✅ REGISTER
    public function register()
    {
        if ($this->io->method() === 'post') {
            $fname = $this->io->post('first_name');
            $lname = $this->io->post('last_name');
            $email = $this->io->post('email');
            $password = password_hash($this->io->post('password'), PASSWORD_DEFAULT);
            $role = $this->io->post('role');

            $this->StudentsModel->insert([
                'first_name' => $fname,
                'last_name'  => $lname,
                'email'      => $email,
                'password'   => $password,
                'role'       => $role
            ]);

            echo "<p>Registered successfully!</p> <a href='" . site_url('students/login') . "'>Login</a>";
        } else {
            $this->call->view('students/register');
        }
    }

    // ✅ LOGOUT
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('students/login');
    }

    // ✅ CRUD (Protected)
    public function index()
    {
        $this->requireLogin();

        $page = isset($_GET['page']) && !empty($_GET['page']) ? $this->io->get('page') : 1;
        $q = isset($_GET['q']) && !empty($_GET['q']) ? trim($this->io->get('q')) : '';
        $records_per_page = 10;

        $this->call->library('pagination');
        $students = $this->StudentsModel->page($q, $records_per_page, $page);
        $data['students'] = $students['records'];
        $total_rows = $students['total_rows'];

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
    $this->requireLogin();

    // ✅ Only admin can create new students
    if ($_SESSION['role'] !== 'admin') {
        echo "<p>⛔ Access Denied. Only admins can add students.</p> 
              <a href='" . site_url('/students') . "'>Back to List</a>";
        return;
    }

    if ($this->io->method() == 'post') {
        $fname = $this->io->post('first_name');
        $lname = $this->io->post('last_name');
        $email = $this->io->post('email');

        $data = [
            'first_name' => $fname,
            'last_name'  => $lname,
            'email'      => $email
        ];

        $this->StudentsModel->insert($data);

        echo "<p>✅ Student created successfully!</p> 
              <a href='" . site_url('/students') . "'>View Data</a>";
    } else {
        $this->call->view('students/create_new');
    }
}


    public function update($id)
    {
        $this->requireLogin();
        if ($_SESSION['role'] !== 'admin') {
        echo "<p>⛔ Access Denied. Only admins can update student records.</p> 
              <a href='" . site_url('/students') . "'>Back to List</a>";
        return;
    }

        if ($this->io->method() == 'post') {
            $fname = $this->io->post('first_name');
            $lname = $this->io->post('last_name');
            $email = $this->io->post('email');
            $newdata = [
                'first_name' => $fname,
                'last_name'  => $lname,
                'email'      => $email
            ];

            $this->StudentsModel->update($id, $newdata);
            echo "<p>Updated successfully!</p> <a href='" . site_url('/') . "'>View Data</a>";
        } else {
            $data = $this->StudentsModel->find($id);
            $this->call->view('students/update_student', $data);
        }
    }

   public function delete($id)
{
    $this->requireLogin(); // make sure user is logged in

    // ✅ Check if user is admin
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        echo "<p>⛔ Access denied. Only admins can delete records.</p>";
        echo "<a href='" . site_url('/') . "'>Go back</a>";
        exit;
    }

    // ✅ Proceed with delete if admin
    $this->StudentsModel->delete($id);
    echo "<p>✅ Deleted successfully!</p> <a href='" . site_url('/') . "'>View Data</a>";
}
}
