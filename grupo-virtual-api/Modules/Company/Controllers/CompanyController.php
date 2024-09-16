<?php

namespace Modules\Company\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Modules\Company\Models\CompanyModel;
use CodeIgniter\API\ResponseTrait;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CompanyController extends BaseController
{
    use ResponseTrait;
    private $companyModel;

    public function __construct(){
        $this->companyModel = new CompanyModel();
    }

    
    public function index()
    {
        $companies =  $this->companyModel->findAll();
        return $this->respond($companies, 200);
    }

    public function checkCnpj($cnpj)
    {
        $company =  $this->companyModel->where('cnpj',$cnpj)->findAll();
        return $this->respond($company, 200);
    }

    
    public function delete($id)
	{
		if($this->companyModel->delete($id)){
             $data = array(
                "status" => "success",
                "id" => $id
            );
            return $this->respondDeleted($data);
        }
	}

    public function uploadFile($file){
        
        if(!count($file))
            return null;
        
            $img = $file['image'];
        if ($img->isValid() && ! $img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(WRITEPATH . '../../public/uploads', $newName);
            return "public/uploads".$newName;
        }
        
    }
    
    public function create()
    {
        $file = $this->request->getFiles();
        $newImage = null;

        $newImage = $this->uploadFile($file);
        $postData = $this->request->getPost();
        $saveData = array(
            "name" => $postData["name"],
            "cnpj" => $postData["cnpj"],
            "image" => (!is_null($newImage)) ? $newImage : $postData["image"]
        );

        $this->customerModel->save($saveData);
        return $this->respond($this->request->getPost(),200);
    }

    public function update()
    {
        $file = $this->request->getFiles();
        $newImage = null;

        $newImage = $this->uploadFile($file);
        $postData = $this->request->getPost();
        $saveData = array(
            "id" => $postData["id"],
            "name" => $postData["name"],
            "cnpj" => $postData["cnpj"],
            "image" => (!is_null($newImage)) ? $newImage : $postData["image"]
        );

        $this->customerModel->save($saveData);
        return $this->respond($this->request->getPost(),200);
    }

    public function exportData(){

        $companies =  $this->companyModel->findAll();

        $file_name = 'companies.xlsx';

		$spreadsheet = new Spreadsheet();

		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Nome');
		$sheet->setCellValue('B1', 'CNPJ');
		$sheet->setCellValue('C1', 'Imagem');
		$sheet->setCellValue('D1', 'Data de criação');

		$count = 2;
		foreach($companies as $row)
		{
			$sheet->setCellValue('A' . $count, $row['name']);
			$sheet->setCellValue('B' . $count, $row['cnpj']);
			$sheet->setCellValue('C' . $count, $row['image']);
			$sheet->setCellValue('D' . $count, $row['created_at']);
			$count++;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($file_name));
		flush();
		readfile($file_name);
		exit;
    }

}
