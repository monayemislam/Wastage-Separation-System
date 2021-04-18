<?php 

		if (session()->get('isLoggedIn')==true) 
		{
			
		}
		else
		{
			return $this->response->redirect(site_url('home')); 
		}


?>