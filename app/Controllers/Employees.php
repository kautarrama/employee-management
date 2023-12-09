<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Employee as EntitiesEmployee;
use App\Models\Employee;
use Exception;

class Employees extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new Employee();
        helper('number');
        session();
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
        $row = new \App\Entities\Employee();
        return view('/pages/employees/form', compact(
            'formTitle',
            'formMethod',
            'formAction',
            'row',
        ));
    }

    public function create()
    {
        $row = $this->request->getPost();

        if ($this->model->insert($row) === false) {
            return redirect()->back()->withInput()->with('validation', $this->model->errors());
        } else {
            session()->setFlashdata('success', ['type' => 'Success', 'message' => 'Data berhasil ditambah']);

            return redirect()->to('/');
        }
    }

    public function edit($id = null)
    {
        $formTitle = "Edit Data Karyawan";
        $formMethod = "POST";
        $formAction = base_url("update/{$id}");
        $row = $this->model->find($id);

        if (!$row) {
            session()->setFlashdata('failed', ['type' => 'Failed', 'message' => 'Data tidak ditemukan']);
            return redirect()->to('/');
        }

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
            session()->setFlashdata('failed', ['type' => 'Failed', 'message' => 'Data tidak ditemukan']);
            return redirect()->back();
        }

        $data = new \App\Entities\Employee();
        $data->fill($this->request->getPost());

        if ($this->model->update($row->employee_id, $data) === false) {
            return redirect()->back()->withInput()->with('validation', $this->model->errors());
        } else {
            session()->setFlashdata('success', ['type' => 'Success', 'message' => 'Data berhasil diupdate']);

            return redirect()->to('/');
        }
    }

    public function delete($id = null)
    {
        if (!$row = $this->model->find($id)) {
            session()->setFlashdata('failed', ['type' => 'Failed', 'message' => 'Data tidak ditemukan']);
            return redirect()->back();
        }

        if ($this->model->delete($row->employee_id)) {
            session()->setFlashdata('success', ['type' => 'Success', 'message' => 'Data berhasil dihapus']);

            return redirect()->to('/');
        }
    }
}
