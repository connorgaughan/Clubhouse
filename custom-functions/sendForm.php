<?php
    function sendForm(){
        if( isset($_POST['page']) && $_POST['page'] == 'w2'){
            session_start();
            $_SESSION['fullName']    = $_POST['fullName'];
            $_SESSION['email']       = $_POST['email'];
            $_SESSION['link']        = $_POST['link'];
            $_SESSION['bio']         = $_POST['bio'];

            $fullName                    = $_SESSION['fullName'];
            $email                   = $_SESSION['email'];
            $link                    = $_SESSION['link'];
            $bio                     = $_SESSION['bio'];


            $header .= "MIME-Version: 1.0\n";
            $header .= "Content-Type: text/html; charset=utf-8\n";
            $headers .= "From:" . $email;

            $message  = "

            <h1>Someone wants to work with us:</h1>
            <p><b>Name:</b> $fullName</p>
            <p><b>Email:</b> <a href='mailto:$email'>$email</a></p>
            <p><b>Portfolio:</b> $link</p>
            <p><b>Bio:</b> $bio</p>

            ";

            $subject = "Contact Form Submission - Work";

            $to = "connorgaughan@gmail.com";

            // send the email
            wp_mail($to, $subject, $message, $header);

            if (wp_mail($to, $subject, $message, $header) ){
                header ('Location: http://localhost:8888/GitHub/ClubhouseCreative/wordpress/contact/thanks');
                exit;
            } else {
                echo '
                    <p>Error.</p>
                ';
            }

        } elseif( isset($_POST['page']) && $_POST['page'] == 'g2'){
            session_start();
            $_SESSION['fullName']   = $_POST['fullName'];
            $_SESSION['email']      = $_POST['email'];
            $_SESSION['message']    = $_POST['message'];

            $name                   = $_SESSION['fullName'];
            $email                  = $_SESSION['email'];
            $message                = $_SESSION['message'];

            $header .= "MIME-Version: 1.0\n";
            $header .= "Content-Type: text/html; charset=utf-8\n";
            $headers .= "From:" . $email;

            $message  = "
            
            <h1>General Inquery:</h1>
            <p><b>Name:</b> $name</p>
            <p><b>Email:</b> <a href='mailto:$email'>$email</a></p>
            <p><b>Message:</b> $message</p>
            
            ";

            $subject = "Contact Form Submission - General Contact";

            $to = "connorgaughan@gmail.com";

            // send the email
            wp_mail($to, $subject, $message, $header);

            if (wp_mail($to, $subject, $message, $header) ){
                header ('Location: http://localhost:8888/GitHub/ClubhouseCreative/wordpress/contact/thanks');
                exit;
            } else {
                echo '
                    <p>Error.</p>
                ';
            }

        } elseif( isset($_POST['page']) && $_POST['page'] == 'q3'){
            session_start();
            $projectName = $_SESSION['projectName'];
            $projectDesc = $_SESSION['projectDesc'];
            $projectDoc  = $_SESSION['projectDoc'];
            $budget      = $_SESSION['budget'];
            $fullName    = $_POST['fullName'];
            $email       = $_POST['email'];
            $phone       = $_POST['phone'];

            $uploaddir = 'http://localhost:8888/GitHub/ClubhouseCreative/quotes/';
            $uploadfile = $uploaddir . basename($_FILES['projectDoc']['name']);

            if(is_uploaded_file($_FILES['projectDoc']['tmp_name'])) {
                move_uploaded_file($_FILES['projectDoc']['tmp_name'], $target.$_FILES['iprojectDoc']['name']);
                echo "The file ". basename( $_FILES['projectDoc']['name']). " has been uploaded...";
            }

            $header .= "MIME-Version: 1.0\n";
            $header .= "Content-Type: text/html; charset=utf-8\n";
            $headers .= "From:" . $email;

            $message  = "
            
            <p><b>Name:</b> $fullName</p>
            <p><b>Email:</b> <a href='mailto:$email'>$email</a></p>
            <p><b>Phone:</b> $phone</p>
            <p><b>Project Name:</b> $projectName</p>
            <p><b>Project Description:</b> $projectDesc</p>
            <p><b>Project Doc:</b> <a href='$uploadfile'>$projectDoc</p>
            <p><b>Budget:</b> $budget</p>
            
            ";

            $subject = "Contact Form Submission - Request for Quote";

            $to = "connorgaughan@gmail.com";

            // send the email
            if (wp_mail($to, $subject, $message, $header) ){
                header ('Location: http://localhost:8888/GitHub/ClubhouseCreative/wordpress/contact/thanks');
                exit;
            } else {
                echo '
                    <p>Error.</p>
                ';
            }
        }
    }
?>