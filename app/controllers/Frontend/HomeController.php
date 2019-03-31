<?php
namespace App\controllers\frontend;
use App\controllers\Controller;
use App\Models\Users;
use Carbon\Carbon;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Respect\Validation\Validator;


class HomeController extends Controller
{
    public function getIndex(){
      view('home');
    }
    public function getRegister(){
        view('register');
    }

    public function postRegister()
    {
        //user data vlaidation useing respect package
         $validator=new Validator();
          $errors=[];
          $username=$_POST['username'] ;
          $email=$_POST['email'] ;
          $password=$_POST['password'] ;
          $profile_photo=$_FILES['profile_photo'] ;
          if($validator::alnum()->noWhitespace()->validate($username) ===false){
              $errors['username']='Username can only contain alphabets or numeric';
          }
          if(\strlen($username > 6)){
              $errors['username']='Username must be 6 characters';
          }
          if($validator::email()->validate($email)===false){
              $errors['email']='Email must be a valid email address';
          }
        if (\strlen($password) < 6) {
            $errors['password'] = 'Password must have at least 6 chars';
        }


        if($validator::image()->validate($profile_photo['name'])){

            $errors['profile_photo']= 'Profile photo must be an image file';
        }

        if(empty($errors)){
            //photo upload 
            $file_name = 'profile_photo_'.time();
            $extension = explode('.', $profile_photo['name']);

            $ext = end($extension);
           $upload= move_uploaded_file($profile_photo['tmp_name'], 'media/user_profile_photo/'.$file_name.'.'.$ext);
            $token = sha1($username.$email.uniqid('llc', true));

            Users::create([
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'profile_photo' => $file_name.'.'.$ext,
                'email_verification_token' => $token,
            ]);
            //send maile
            $mail=new PHPMailer(true) ;
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'bbf4e0ab78475b';                     // SMTP username
                $mail->Password   = '0d080ca02f9930';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 2525;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('sohelcse1999@gmail.com', 'System User');
                $mail->addAddress($email, $username);     // Add a recipient

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Registration successful';
                $mail->Body    = 'Dear '.$username.', <br/>
            Please click the following link to activate your account<br/>
            <a href="http://llc-ecommerce.mo/activate/'.$token.'">Click Here to Activate</a>
            <br/>- LLC Team';
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
            $_SESSION['success']="User Registration Successful";
            header('Location: /login');
            exit();


        }
        $_SESSION['errors']=$errors;
        header('Location: /register');
        exit();
    }

    public function  getLogin(){
        view('login');
    }
    public function postLogin(){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $validator=new Validator();
        $errors=[];
        if($validator::email()->validate($email)===false){
            $errors['email']='Email must be a valid email address';
        }
        if(empty($errors)){
           $user=Users::select(['id','username','password','email_verified_at'])->where('email',$email)->first();
           if($user) {
               if($user->email_verified_at===null){
                   $errors[]='Account is not verified';
                   $_SESSION['errors']=$errors;
                   header('Location: /login');
                   exit() ;
               }
               if(password_verify($password,$user->password)){
                   $_SESSION['user']=[
                       'id'=>$user->id,
                       'username'=>$user->username,
                       'role'=>$user->role
                   ];
                   header('Location: /deshboard');
                   exit();
               }else{
                   $errors[]='password invalid';
                   $_SESSION['errors']=$errors;
                   header('Location: /login');
                   exit() ;
               }
           }
        }
        $errors[]='User not found';
        $_SESSION['errors']=$errors;
        header('Location: /login');
        exit() ;
    }
    public function  getActivate($token=''){
        $errors[]='';
        if(empty($token)){
            $errors[]='No token provided';
            $_SESSION['errors']=$errors;
            header('Location: /login');
            exit();
        }
        $user=Users::where('email_verification_token',$token)->first();
        if($user){
            $user->update([
                'email_verified_at'=>Carbon::now(),
                 'email_verification_token'=>null
            ]);
            $_SESSION['success']='Account activate .you can login now';
            header('Location: /login');
            exit();
        }

        $errors[]='Invalid token provided';
        $_SESSION['errors']=$errors;
        header('Location: /login');
        exit();
    }
    //end login process
    //start logout process
    public  function getLogout():void {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: /login');
        exit();

    }



}