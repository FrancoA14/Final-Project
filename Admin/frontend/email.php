<?php
define('ROOT_PATH', dirname(__DIR__) . '/../');

//Get database connection
include(ROOT_PATH.'User/database.php');


    $database = new Database();
    $db = $database->getConnection();
        
    // prepare user object
    $conn = $db;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../../PHPMailer-master/src/Exception.php';
    require '../../PHPMailer-master/src/PHPMailer.php';
    require '../../PHPMailer-master/src/SMTP.php';

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPDebug = 0;
    $mail->SMTPSecure = "tls";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "caseymensah@gmail.com";
    $mail->Password   = "Ea24j5n4hm0";

    
    if(isset($_POST['send'])){
        $query =  "SELECT email FROM users WHERE UserID IN
                    (SELECT UserID FROM bookings WHERE RideID =".$_POST['rideID'].")";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $email = $row["email"];
                $headers = "From: ashtransit@gmail.com";
                $subject = $_POST['subject'];
                $message = $_POST['message'];
                $mail->IsHTML(true);
                $mail->AddAddress("$email");
                $mail->SetFrom("noreply@astransit.com", "AshTransit");
                $mail->AddReplyTo("noreply@ashtransit.com", "noreply");
                $mail->Subject = "$subject";
                $content = "$message";
                $mail->MsgHTML($content);
                if(!$mail->Send()) {
                    echo "Error while sending Email.";
                    var_dump($mail);
                    } else {
                        session_start();
                        $_SESSION['Message'] = "E-mail sent sucessfully";
                        header('Location: index.php');
                        }
            }
        } 
        else {
            echo '<script defer>alert("Error! Unable to send message.");
            window.location.href="users.php";<script>';
        }
    }

?>