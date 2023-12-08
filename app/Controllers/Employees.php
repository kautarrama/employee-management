<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Employee;
use CodeIgniter\Entity\Entity;
use Exception;

class Employees extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new Employee();
        helper('number');
    }

    public function index()
    {
        $message = null;
        if (!$rows = $this->model->findAll()) {
            $message = "No Data";
        }
        return view('/pages/employees/index', compact(
            "rows",
            "message"
        ));
    }

    public function new()
    {
        $formTitle = "Tambah Karyawan Baru";
        $formMethod = "POST";
        $formAction = base_url('create');
        $row = new Entity();
        return view('/pages/employees/form', compact(
            'formTitle',
            'formMethod',
            'formAction',
            'row'
        ));
    }

    public function create()
    {
        // dd($this->request->getPost());
        $row = $this->request->getPost();

        if ($this->model->insert($row)) {
            return redirect()->to('/');
        }

        return new Exception("Bad Request", 500);
    }

    public function edit($id = null)
    {
        $formTitle = "Edit Data Karyawan";
        $formMethod = "POST";
        $formAction = base_url("update/{$id}");
        $row = $this->model->find($id);

        return view('/pages/employees/form', compact(
            'formTitle',
            'formAction',
            'formMethod',
            'row'
        ));
    }

    public function update($id = null)
    {
        if (!$row = $this->model->find($id)) {
            return new Exception("Not found", 404);
        }

        $row = new Entity($this->request->getPost());

        if ($this->model->update($id, $row)) {
            return redirect()->to('/');
        }

        return new Exception('Bad Request', 500);
    }

    public function delete($id = null)
    {
        if (!$row = $this->model->find($id)) {
            return new Exception("Not found", 404);
        }

        if ($this->model->delete($id)) {
            return redirect()->to('/');
        }

        return new Exception('Bad Request', 500);
    }
}
