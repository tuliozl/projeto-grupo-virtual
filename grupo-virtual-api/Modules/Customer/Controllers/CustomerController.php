<?php

namespace Modules\Customer\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Modules\Customer\Models\CustomerModel;
use CodeIgniter\API\ResponseTrait;

class CustomerController extends BaseController
{
    use ResponseTrait;
    private $customerModel;

    public function __construct(){
        $this->customerModel = new CustomerModel();
    }
    
    public function index()
    {
        $customers =  $this->customerModel->findAll();
        return $this->respond($customers, 200);
    }

    
    public function delete($id)
	{
		if($this->customerModel->delete($id)){
             $data = array(
                "status" => "success",
                "id" => $id
            );
            return $this->respondDeleted($data);
        }
	}
    
    public function create()
    {
        $this->customerModel->save($this->request->getPost());
        return $this->respond($this->request->getPost(),200);
    }

    public function update()
    {
        $this->customerModel->save($this->request->getPost());
        return $this->respond($this->request->getPost(),200);
    }
}
