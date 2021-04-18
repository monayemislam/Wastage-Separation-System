<?php 
namespace App\Controllers;
use App\Models\Users;
use App\Models\Units;
use CodeIgniter\Controller;

class Admin extends Controller
{
	
	function adminHome()
	{
		$data = [];
		$data['title']="Home";
		echo view('template/header.php',$data);
		echo view('admin/adminHome');
		echo view('template/footer.php');
	}

	function adminDashboard()
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$data = [];
			$data['title']="Home";

			$db = \Config\Database::connect();

			$userBuilder = $db->table('user');
			$data['totalUser']=$userBuilder->countAllResults();

			$roleBuilder = $db->table('role');
			$data['totalRole']=$roleBuilder->countAllResults();

			$organizationBuilder = $db->table('disposal_organization');
			$data['totalOrganization']=$organizationBuilder->countAllResults();

			$typeBuilder = $db->table('wastage_type');
			$data['totalType']=$typeBuilder->countAllResults();

			$unitBuilder = $db->table('wastage_unit');
			$data['totalUnit']=$unitBuilder->countAllResults();

			echo view('template/header.php',$data);
			echo view('admin/adminDashboard');
			echo view('template/footer.php');
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
	}
	//user module starts from here
	function user()
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$data = [];
			$data['title']="Users";

			//fetch role data from user table 
			$db = \Config\Database::connect();

			$userRoleBuilder = $db->table('role');
	        $data['userRoles'] = $userRoleBuilder->get();
			
			$userModel=new Users();

			// $query = $db->query("SELECT * FROM user");
			$query = $db->query("SELECT * FROM user,role WHERE user.user_role=role.role_id");

			$data['users'] = $query->getResultArray();

			echo view('template/header.php',$data);
			echo view('admin/user');
			echo view('template/footer.php');
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}

		
	}


	function deleteUser($userId)
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$db = \Config\Database::connect();
			$userModel=new Users();
			$query = $db->query("DELETE FROM user WHERE user.user_id='$userId'");
			return $this->response->redirect(site_url('admin/user'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
	}

	function updateUser($userId)
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$userId = $_POST['userId'];
		$userName = $_POST['userName'];
		$userEmail = $_POST['userEmail'];
		$userPassword = $_POST['userPassword'];
		$userRole = $_POST['userRole'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];



		$db      = \Config\Database::connect();
		$builder = $db->table('user');

		$data = [
			    'user_name' => $userName,
			    'user_email' => $userEmail,
			    'user_password' => $userPassword,
			    'user_role'=> $userRole,
				'contact' => $contact,
				'address' => $address,
				];

		$builder->where('user_id', $userId);
		$builder->update($data);

		return $this->response->redirect(site_url('admin/user'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
	}


	public function createUser()
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$data = [
			    'user_name' => $_POST['userName'],
			    'user_email' => $_POST['userEmail'],
			    'user_password' => $_POST['userPassword'],
			    'user_role'=> $_POST['userRole'],
				'contact' => $_POST['contact'],
				'address' => $_POST['address'],
				];

			$db      = \Config\Database::connect();
			$builder = $db->table('user');
			$builder->insert($data);
			return $this->response->redirect(site_url('admin/user'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
		
	}
	//End of User Module



	//Starting of Wastage Unit

	public function wastageUnit()
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$data = [];
			$data['title']="Wastage Unit";

			//fetch role data from user table 
			$db = \Config\Database::connect();

			$wastageUnitBuilder = $db->table('wastage_unit');

			$query = $db->query("SELECT * FROM wastage_unit");

			$data['units'] = $query->getResultArray();

			echo view('template/header.php',$data);
			echo view('admin/wastageUnit');
			echo view('template/footer.php');
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
	}



	function deleteUnit($unitId)
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$db = \Config\Database::connect();
			$userModel=new Units();

			$query = $db->query("DELETE FROM wastage_unit WHERE wastage_unit.wastage_unit_id='$unitId'");

			return $this->response->redirect(site_url('admin/wastageUnit'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
	}

	function updateUnit($unitId)
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$unitId = $_POST['unitId'];
			$unitName = $_POST['unitName'];
			$unitDescription = $_POST['unitDescription'];

			$db      = \Config\Database::connect();
			$builder = $db->table('wastage_unit');

			$data = [
				    'wastage_unit_name' => $unitName,
				    'wastage_unit_description' => $unitDescription,
					];

			$builder->where('wastage_unit_id', $unitId);
			$builder->update($data);

			return $this->response->redirect(site_url('admin/wastageUnit'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
	}


	public function createUnit()
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$data = [
			    'wastage_unit_name' => $_POST['unitName'],
			    'wastage_unit_description' => $_POST['unitDescription'],
				];

			$db      = \Config\Database::connect();
			$builder = $db->table('wastage_unit');
			$builder->insert($data);
			return $this->response->redirect(site_url('admin/wastageUnit'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}


	}
	
	//End of wastage unit



	//Starting of Wastage Type

	public function wastageType()
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$data = [];
			$data['title']="Wastages Type";

			$db = \Config\Database::connect();
			$query = $db->query("SELECT * FROM wastage_type,bin WHERE wastage_type.bin=bin.bin_id");
			$data['types'] = $query->getResultArray();

			$binBuilder = $db->table('bin');
	        $data['bins'] = $binBuilder->get();

			echo view('template/header.php',$data);
			echo view('admin/wastageType');
			echo view('template/footer.php');
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
		
	}



	function deleteType($typeId)
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$db = \Config\Database::connect();
			$query = $db->query("DELETE FROM wastage_type WHERE wastage_type.wastage_type_id='$typeId'");
			return $this->response->redirect(site_url('admin/wastageType'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}

	}

	function updateType($typeId)
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$typeName = $_POST['typeName'];
			$typeDescription = $_POST['typeDescription'];
			$binColor = $_POST['binColor'];

			$db      = \Config\Database::connect();
			$builder = $db->table('wastage_type');

			$data = [
				    'wastage_type_name' => $typeName,
				    'wastage_type_description' => $typeDescription,
				    'bin'=> $binColor
					];

			$builder->where('wastage_type_id', $typeId);
			$builder->update($data);

			return $this->response->redirect(site_url('admin/wastageType'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}



	}


	public function createType()
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$data = [
			    'wastage_type_name' => $_POST['typeName'],
			    'wastage_type_description' => $_POST['typeDescription'],
			    'bin'=> $_POST['binColor']
				];

			$db      = \Config\Database::connect();
			$builder = $db->table('wastage_type');
			$builder->insert($data);
			return $this->response->redirect(site_url('admin/wastageType'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
		
	}
	


	//End of wastage Type


//Starting of Responsible Organization

	public function organization()
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$data = [];
			$data['title']="Organization";

			$db = \Config\Database::connect();
			$query = $db->query("SELECT * FROM disposal_organization");
			$data['organizations'] = $query->getResultArray();

			echo view('template/header.php',$data);
			echo view('admin/organization');
			echo view('template/footer.php');
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
		
	}



	function deleteOrganization($organizationId)
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$db = \Config\Database::connect();

			$query = $db->query("DELETE FROM disposal_organization WHERE disposal_organization.disposal_organization_id='$organizationId'");

			return $this->response->redirect(site_url('admin/organization'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
		
	}

	function updateOrganization($organizationId)
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$organizationName = $_POST['organizationName'];
			$organizationDescription = $_POST['organizationDescription'];


			$db      = \Config\Database::connect();
			$builder = $db->table('disposal_organization');

			$data = [
				    'disposal_organization_name' => $organizationName,
				    'disposal_organization_description' => $organizationDescription,
					];

			$builder->where('disposal_organization_id', $organizationId);
			$builder->update($data);

			return $this->response->redirect(site_url('admin/organization'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}


	}


	public function createOrganization()
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$data = [
			    'disposal_organization_name' => $_POST['organizationName'],
			    'disposal_organization_description' => $_POST['organizationDescription'],
				];

			$db      = \Config\Database::connect();
			$builder = $db->table('disposal_organization');
			$builder->insert($data);
			return $this->response->redirect(site_url('admin/organization'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}

	}
	
	//End of Responsible Organization





	//Starting of Wastage

	public function wastage()
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$data = [];
			$data['title']="Wastages";

			$db = \Config\Database::connect();


			$query = $db->query("
				SELECT * FROM wastage,user,disposal_organization,wastage_unit,wastage_type,bin
				where wastage.created_by=user.user_id
				AND disposal_organization.disposal_organization_id=wastage.disposal_organization
				AND wastage_unit.wastage_unit_id=wastage.wastage_unit
				AND wastage_type.wastage_type_id=wastage.wastage_type
                AND wastage_type.bin=bin.bin_id
			");
			$data['wastages'] = $query->getResultArray();

			$wastageTypeBuilder = $db->table('wastage_type');
		    $data['wastagesTypes'] = $wastageTypeBuilder->get();

		    $organizationBuilder = $db->table('disposal_organization');
		    $data['organizations'] = $organizationBuilder->get();

		    $unitBuilder = $db->table('wastage_unit');
		    $data['units'] = $unitBuilder->get();

			echo view('template/header.php',$data);
			echo view('admin/wastage');
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
			return $this->response->redirect(site_url('admin/wastage'));
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

			return $this->response->redirect(site_url('admin/wastage'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
	}



	//End of wastage Type

	public function bin()
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$data = [];
			$data['title']="Bin";

			$db = \Config\Database::connect();
			$query = $db->query("SELECT * FROM bin");
			$data['bins'] = $query->getResultArray();

			echo view('template/header.php',$data);
			echo view('admin/bin');
			echo view('template/footer.php');
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}
		
	}

function deleteBin($binId)
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$db = \Config\Database::connect();
			$query = $db->query("DELETE FROM bin WHERE bin.bin_id='$binId'");
			return $this->response->redirect(site_url('admin/bin'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}

	}

	function updateBin($binId)
	{
		if (session()->get('isLoggedIn')==true) 
		{

			$db      = \Config\Database::connect();
			$builder = $db->table('bin');

			$data = [
				    'bin_color' => $_POST['binColor'],
					];

			$builder->where('bin_id', $binId);
			$builder->update($data);

			return $this->response->redirect(site_url('admin/bin'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}



	}

public function createBin()
	{
		if (session()->get('isLoggedIn')==true) 
		{
			$data = [
			    'bin_color' => $_POST['binColor']
				];

			$db      = \Config\Database::connect();
			$builder = $db->table('bin');
			$builder->insert($data);
			return $this->response->redirect(site_url('admin/bin'));
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}

	}














}
 

?>