<?
class RegistrationController {
	public function actionRegister() {
		$name='';
		$email='';
		$password='';
		if(isset($_POST['submit'])) {
			$name=$_POST['text'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$errors = array();
			if(!Registration::checkLogin($name)){
				$errors[]='Login is incorrect';
			}
			if(!Registration::checkEmail($email)){
				$errors[]='Email is incorrect';
			}
			if(!Registration::checkPassword($password)){
				$errors[]='Password is incorrect';
			}
			if(!Registration::checkUser($email)){
				$errors[]='This email is allready exist';
			}
			if(!$errors) {
				$isRegistered = Registration::addUser($name, $email, $password);
			}
			
		}
		include ROOT.'/views/RegistrationView.php';
	}
}