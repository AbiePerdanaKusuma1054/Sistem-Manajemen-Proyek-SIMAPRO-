<?php

namespace App\Controllers;

use App\Models\ClientModel;
use monken\TablesIgniter;

class Client extends BaseController
{

    public function __construct()
    {
        $this->clientModel = new ClientModel();
    }

    public function index()
    {
        $sessions = [
            'client_mode' => true,
            'project_mode' => false,
            'dashboard_mode' => false,
            'user_mode' => false
        ];

        session()->set($sessions);
        return view('client');
    }

    public function fetchClientData()
    {
        $table = new TablesIgniter();

        $table->setTable($this->clientModel->noticeTable())
            ->setDefaultOrder('client_name', 'ASC')
            ->setOrder(['client_name', 'client_email', null, null])
            ->setSearch(['client_name', 'client_email', 'client_address'])
            ->setOutput(['client_name', 'client_email', 'client_address', $this->clientModel->button()]);
        return $table->getDatatable();
    }

    public function saveClientData()
    {
        $request = service('request');

        if ($request->getVar('action')) {
            helper(['form', 'url']);
            $name_error = '';
            $email_error = '';
            $address_error = '';
            $error = 'no';

            if ($request->getVar('action') == 'create') {
                $rules = [
                    'name' => 'required|is_unique[client.client_name]|max_length[255]',
                    'email' => 'required|valid_email|is_unique[client.client_email]|max_length[50]',
                    'address' => 'required|max_length[255]'
                ];
            }

            if ($request->getVar('action') == 'edit') {
                $rules = [
                    'name' => 'required|max_length[255]',
                    'email' => 'required|valid_email|max_length[50]',
                    'address' => 'required|max_length[255]'
                ];
            }



            $error = $this->validate($rules);

            if (!$error) {
                $error = 'yes';
                $validator = \Config\Services::validation();

                if ($validator->getError('name')) {
                    $name_error = $validator->getError('name');
                }

                if ($validator->getError('email')) {
                    $email_error = $validator->getError('email');
                }

                if ($validator->getError('address')) {
                    $address_error = $validator->getError('address');
                }
            } else {
                if ($request->getVar('action') == 'create') {
                    $this->clientModel->save([
                        'client_name' => $request->getVar('name'),
                        'client_email' => $request->getVar('email'),
                        'client_address' => $request->getVar('address')
                    ]);
                }

                if ($request->getVar('action') == 'edit') {
                    $id = $request->getVar('hidden_id');
                    $data = [
                        'client_name' => $request->getVar('name'),
                        'client_email' => $request->getVar('email'),
                        'client_address' => $request->getVar('address')
                    ];

                    $this->clientModel->update($id, $data);
                }
            }

            $output = [
                'name_error' => $name_error,
                'email_error' => $email_error,
                'address_error' => $address_error,
                'error' => $error
            ];

            echo json_encode($output);
        }
    }

    public function fetchIdClient()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $clientID = $this->clientModel->where('id', $request->getVar('id'))->first();
            echo json_encode($clientID);
        }
    }

    public function deleteClient()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $id = $request->getVar('id');
            $this->clientModel->where('id', $id)->delete();
        }
    }
}
