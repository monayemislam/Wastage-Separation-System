<?php 
namespace App\Controllers;
use CodeIgniter\Controller;

class User extends Controller
{
	
	function userHome()
	{
		$data = [];
		$data['title']="Home";
		echo view('template/header.php',$data);
		echo view('admin/userHome');
		echo view('template/footer.php');
	}

	function userDashboard()
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$data = [];
			$data['title']="Dashboard";
			echo view('template/header.php',$data);
			echo view('user/userDashboard');
			echo view('template/footer.php');
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
		
	}

	function wastageForm()
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$data = [];
			$data['title']="Wastage";


			$db = \Config\Database::connect();


			$query = $db->query("
				SELECT * FROM wastage,user,disposal_organization,wastage_unit,wastage_type
				where wastage.created_by=user.user_id
				AND disposal_organization.disposal_organization_id=wastage.disposal_organization
				AND wastage_unit.wastage_unit_id=wastage.wastage_unit
				AND wastage_type.wastage_type_id=wastage.wastage_type
			");
			$data['wastages'] = $query->getResultArray();

			$wastageTypeBuilder = $db->table('wastage_type');
		    $data['wastagesTypes'] = $wastageTypeBuilder->get();

		    $organizationBuilder = $db->table('disposal_organization');
		    $data['organizations'] = $organizationBuilder->get();

		    $unitBuilder = $db->table('wastage_unit');
		    $data['units'] = $unitBuilder->get();



			echo view('template/header.php',$data);
			echo view('user/wastageForm.php');
			echo view('template/footer.php');
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
		
	}


	public function saveRecord()
	{

			$db = \Config\Database::connect();

			$wastageName = $_POST['wastageName'];
			$wastageDescription = $_POST['wastageDescription'];
			$wastageType = $_POST['wastageType'];
			$wastageQuantity = $_POST['wastageQuantity'];
			$wastageUnit = $_POST['wastageUnit'];
			$disposalOrganization = $_POST['disposalOrganization'];
			$createdBy = session()->get('userId');

			$data = [
				    'wastage_name' => $wastageName,
				    'wastage_description' => $wastageDescription,
				    'wastage_type' => $wastageType,
				    'wastage_quantity' => $wastageQuantity,
				    'wastage_unit' => $wastageUnit,
				    'disposal_organization' => $disposalOrganization,
				    'created_by'=>$createdBy
					];
			
			$builder = $db->table('wastage');
			$builder->insert($data);
			return $this->response->redirect(site_url('User/wastage'));
	}



//Starting of Wastage

	public function wastage()
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$data = [];
			$data['title']="Wastages";

			$db = \Config\Database::connect();

			$userId = session()->get('userId');
			$query = $db->query("
				SELECT * FROM wastage,user,disposal_organization,wastage_unit,wastage_type
				where wastage.created_by=user.user_id
				AND disposal_organization.disposal_organization_id=wastage.disposal_organization
				AND wastage_unit.wastage_unit_id=wastage.wastage_unit
				AND wastage_type.wastage_type_id=wastage.wastage_type
				AND $userId = wastage.created_by
			");
			$data['wastages'] = $query->getResultArray();

			$wastageTypeBuilder = $db->table('wastage_type');
		    $data['wastagesTypes'] = $wastageTypeBuilder->get();

		    $organizationBuilder = $db->table('disposal_organization');
		    $data['organizations'] = $organizationBuilder->get();

		    $unitBuilder = $db->table('wastage_unit');
		    $data['units'] = $unitBuilder->get();

			echo view('template/header.php',$data);
			echo view('User/wastage');
			echo view('template/footer.php');
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
		
	}



	function deleteWastage($wastageId)
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$db = \Config\Database::connect();
			$query = $db->query("DELETE FROM wastage WHERE wastage.wastage_id='$wastageId'");
			return $this->response->redirect(site_url('User/wastage'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}

	}

	function updateWastage($wastageId)
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$wastageName = $_POST['wastageName'];
			$wastageDescription = $_POST['wastageDescription'];
			$wastageType = $_POST['wastageType'];
			$wastageQuantity = $_POST['wastageQuantity'];
			$wastageUnit = $_POST['wastageUnit'];
			$disposalOrganization = $_POST['disposalOrganization'];


			$db      = \Config\Database::connect();
			$builder = $db->table('wastage');

			$data = [
				    'wastage_name' => $wastageName,
				    'wastage_description' => $wastageDescription,
				    'wastage_type' => $wastageType,
				    'wastage_quantity' => $wastageQuantity,
				    'wastage_unit' => $wastageUnit,
				    'disposal_organization' => $disposalOrganization,
					];

			$builder->where('wastage_id', $wastageId);
			$builder->update($data);

			return $this->response->redirect(site_url('user/wastage'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
	}



	//End of wastage Type













}
 

?>