<?php 
namespace App\Controllers;
use App\Models\UserType;
use App\Models\Users;
use CodeIgniter\Controller;

class Home extends Controller
{

	public function index()
	{
		$data = [];
		$data['title']="Login";
		helper(['form']);

		// fetch usertype
		$db = \Config\Database::connect();
		$userRoleBuilder = $db->table('role');
        $data['userRoles'] = $userRoleBuilder->get();



		if ($this->request->getMethod() == 'post') {
			//validate user details
			$rules = [
				'userEmail' => ['label' => 'Email', 'rules' => 'required|valid_email'],
    			'userPassword' => ['label' => 'Password', 'rules' => 'required']
			];

			if (! $this->validate($rules)) 
			{
				$data['validation'] = $this->validator;
			}
			else
			{
				//store data from login form
		       $userEmail = $this->request->getVar('userEmail');
		       $userPassword = $this->request->getVar('userPassword');
		       $userRoleId = $this->request->getVar('userRole');

		       //fetch role data from role table 
		       $userModel=new Users();

				$query = $db->query("SELECT * FROM User WHERE user_role='$userRoleId' AND user_email='$userEmail' AND user_password='$userPassword'");

				$userDetails = $query->getRowArray();

				if (isset($userDetails)) 
				{
					$data = [
					'userId' => $userDetails['user_id'],
					'userName' => $userDetails['user_name'],
					'userRole' =>$userDetails['user_role'],
					'email' => $userDetails['user_email'],
					'isLoggedIn' => true,
					];
					session()->set($data);

					if ($data['userRole']==2 && $data['isLoggedIn']==true) 
					{
						return $this->response->redirect(base_url('Admin/adminDashboard'));
					}
					if ($data['userRole']==1 && $data['isLoggedIn']==true) 
					{
						return $this->response->redirect(base_url('User/wastageForm'));
					}
					
				}
				else
				{
					$data['invalidCredential']= "Invalid Credentials ! Please try again.";
				}

			}
		}

		echo view('template/header', $data);
		echo view('login');
		echo view('template/footer');
	}


	public function register()
	{	
		$data = [];
		$data['title']="Register";
		helper(['form']);

		// fetch usertype
		$db = \Config\Database::connect();
		$userRoleBuilder = $db->table('role');
		$userRoleBuilder->where('role_id', 1);
        $data['userRoles'] = $userRoleBuilder->get();
		echo view('template/header', $data);
		echo view('register');
		echo view('template/footer');
	}

	public function registerValidation()
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


	public function logout()
	{
		session()->destroy();
		return $this->response->redirect(site_url('home'));
	}



}

?>