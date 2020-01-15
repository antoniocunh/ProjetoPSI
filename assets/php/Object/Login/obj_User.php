<?php
require_once 'dbconfig.php';//Mudar o DbConfig Atual para POO
require 'mailer/PHPMailerAutoload.php';

class USER
{

    private $conn;

    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql)
    {
        $stmt = $this
            ->conn
            ->prepare($sql);
        return $stmt;
    }

    public function lasdID()
    {
        $stmt = $this
            ->conn
            ->lastInsertId();
        return $stmt;
    }

    public function register($uname, $email, $upass, $code)
    {
        try
        {
            $password = md5($upass);
            $stmt = $this
                ->conn
                ->prepare("INSERT INTO tb_user(vcUsername,vcEmail,vcPassword,vcTokenCode) 
                                                VALUES(:user_name, :user_mail, :user_pass, :active_code)");
            $stmt->bindparam(":user_name", $uname);
            $stmt->bindparam(":user_mail", $email);
            $stmt->bindparam(":user_pass", $password);
            $stmt->bindparam(":active_code", $code);
            $stmt->execute();
            return $stmt;
        }
        catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }

    public function login($email, $upass)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM tb_user WHERE vcEmail=:email_id");
            $stmt->execute(array(":email_id" => $email));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() == 1)
            {
                if ($userRow['enumUserStatus'] == "Y")
                {
                    if ($userRow['vcPassword'] == md5($upass))
                    {
                        $_SESSION['userSession'] = $userRow['iIdUser'];
                        return true;
                    }
                    else
                    {
                        header("Location: index.php?error");
                        exit;
                    }
                }
                else
                {
                    header("Location: index.php?inactive");
                    exit;
                }
            }
            else
            {
                header("Location: index.php?error");
                exit;
            }
        }
        catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }

    public function is_logged_in()
    {
        if (isset($_SESSION['userSession']))
        {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function logout()
    {
        session_destroy();
        $_SESSION['userSession'] = false;
    }

    function send_mail($email, $message, $subject)
    {
        $mail = new PHPMailer;
        $mail->isSMTP();//Para LocalHost

        $mail->Host = 'smtp.gmail.com';
        $mail->Port =  587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'conferenciaestga@gmail.com';
        $mail->Password = '123456789AA!!';
        $mail->setFrom('conferenciaestga@gmail.com', 'Estga Conferencia');
        $mail->addAddress($email);
        $mail->addReplyTo("conferenciaestga@gmail.com", "Estga Conferencia");
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->Send();
    }
}

