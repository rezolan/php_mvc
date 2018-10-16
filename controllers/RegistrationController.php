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
				$id = time() . rand(0,1000000000);
				$isRegistered = Registration::addUser($id, $name, $email, $password);
//        $headers ='From: cgfdgtewadfer@gmail.com';

        mail('cgfdgtewadfer@gmail.com', 'registration', "http://dbweb.ru/registration/confirm/$id");
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
				$this->user = 'Access denied!Password or email is incorrect! Or you did not confirm email';
			}
		}
		$this->actionRegister();
	}
	public function actionDestroy() {
		unset($_SESSION['user_id']);
		session_destroy();
		$this->actionRegister();
	}
	public function actionConfirm($id) {
		$id = $id[0];
		if(Registration::confirm($id)) {
			echo '<br><br><br><h1>You can login using your email and password</h1><br><br><br>';
		} else {
			echo '<br><br><br><h1>Error! Try again!</h1><br><br><br>';
		}


	}
}