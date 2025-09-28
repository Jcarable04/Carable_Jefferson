<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class StudentsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('StudentsModel');

        // Load libraries
        $this->call->library('session');    
        $this->call->library('form_validation');
        $this->call->library('pagination');
    }

    // === Index with search + pagination ===
    public function index()
    {
        $page = isset($_GET['page']) && !empty($_GET['page']) ? $this->io->get('page') : 1;
        $q = isset($_GET['q']) && !empty($_GET['q']) ? trim($this->io->get('q')) : '';
        $records_per_page = 10;

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

        // Pass flash messages and login status
        $flash = $this->session->userdata('flash') ?? null;
        $data['flash'] = $flash;
        if ($flash) $this->session->unset_userdata('flash');

        $data['logged_in'] = $this->session->userdata('logged_in') ?? false;

        $this->call->view('students/students_data', $data);
    }

    // === CRUD ===
    public function create()
    {
        if ($this->io->method() == 'post') {
            $data = [
                'first_name' => $this->io->post('first_name'),
                'last_name'  => $this->io->post('last_name'),
                'email'      => $this->io->post('email')
            ];
            $this->StudentsModel->insert($data);
            $this->session->set_flashdata('flash', ['type' => 'success', 'message' => 'Student created successfully!']);
            redirect('students');
        } else {
            $this->call->view('students/create_new');
        }
    }

    public function update($id)
    {
        if ($this->io->method() == 'post') {
            $newdata = [
                'first_name'=> $this->io->post('first_name'),
                'last_name' => $this->io->post('last_name'),
                'email'     => $this->io->post('email')
            ];
            $this->StudentsModel->update($id, $newdata);
            $this->session->set_flashdata('flash', ['type' => 'success', 'message' => 'Student updated successfully!']);
            redirect('students');
        } else {
            $data = $this->StudentsModel->find($id);
            $this->call->view('students/update_student', $data);
        }
    }

    public function delete($id)
    {
        $this->StudentsModel->delete($id);
        $this->session->set_flashdata('flash', ['type' => 'success', 'message' => 'Student deleted successfully!']);
        redirect('students');
    }

    // === AUTH ===
    public function login()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('students');
        }
        $this->call->view('students/login');
    }

    public function login_process()
    {
        $this->form_validation->name('email')->required();
        $this->form_validation->name('password')->required();

        if ($this->form_validation->run()) {
            $email = $this->io->post('email');
            $password = $this->io->post('password');
            $student = $this->StudentsModel->findByEmail($email);

            if ($student && isset($student['password']) && password_verify($password, $student['password'])) {
                $this->session->set_userdata('logged_in', true);
                $this->session->set_userdata('student_id', $student['id']);
                $this->session->set_userdata('role', $student['role'] ?? 'student');

                $this->session->set_flashdata('flash', ['type' => 'success', 'message' => 'Welcome back, ' . $student['first_name'] . '!']);
                redirect('students');
            } else {
                $this->session->set_flashdata('flash', ['type' => 'danger', 'message' => 'Invalid email or password']);
                redirect('students/login');
            }
        } else {
            $this->call->view('students/login');
        }
    }

    public function register()
    {
        $this->call->view('students/register');
    }

    public function register_process()
    {
        $this->form_validation->name('firstname')->required();
        $this->form_validation->name('lastname')->required();
        $this->form_validation->name('email')->required()->valid_email();
        $this->form_validation->name('password')->required()->min_length(6);
        $this->form_validation->name('role')->required();

        if ($this->form_validation->run()) {
            $data = [
                'first_name' => $this->io->post('firstname'),
                'last_name'  => $this->io->post('lastname'),
                'email'      => $this->io->post('email'),
                'password'   => password_hash($this->io->post('password'), PASSWORD_DEFAULT),
                'role'       => $this->io->post('role')
            ];

            $this->StudentsModel->insert($data);
            $this->session->set_flashdata('flash', ['type' => 'success', 'message' => 'Registration successful. Please login.']);
            redirect('students/login');
        } else {
            $this->call->view('students/register');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('student_id');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('flash', ['type' => 'success', 'message' => 'You have been logged out.']);
        redirect('students/login');
    }
}
