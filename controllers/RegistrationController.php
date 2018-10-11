<?
class RegistrationController {
	private $user;
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
		if(isset($_SESSION['user_id'])){
			include ROOT.'/views/OrderView.php';
		} else {
			include ROOT.'/views/registration/RegistrationView.php';
			include ROOT.'/views/registration/AutorisationView.php';
		}
	}
	public function actionAutorisation() {
		$loginEmail='';
		$loginPassword='';
		if(isset($_POST['submit_auto'])) {
			$loginEmail=$_POST['email_auto'];
			$loginPassword=$_POST['password_auto'];
			$user = Registration::checkAutorisation($loginEmail, $loginPassword);
			if($user) {
				$_SESSION['user_id'] = $user['id'];
				$this->user = '';
			} else {
				$this->user = 'Access denied!Password or email is incorrect';
			}
		}
		$this->actionRegister();
	}
	public function actionDestroy() {
		unset($_SESSION['user_id']);
		session_destroy();
		$this->actionRegister();
	}
}