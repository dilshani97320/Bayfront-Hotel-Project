<?php 
    require_once 'Libs/vendor/autoload.php';

    class EmailController{
        
        public function sendVerificationEmail($userEmail, $token, $userName){

            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
            ->setUsername('bayfrontweli45@gmail.com')
            ->setPassword('Bayfront@1998')
            ;
            
            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            // echo EMAIL;
            // echo $token;
            // global $mailer;
            $body = ' <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <title>Verify Email</title>
                    </head>
                    <body>
                        <div class="wrapper" style=" width: 800px;">
                            <h1>Hi <strong> '. $userName .'</strong></h1>
            
                            <p>You have one more step remaining to activate your BAYFRONT account. Click on the button below to verify your email address: <strong>This password reset is only valid for the next 24 hours.</strong></p> 
                            <button style="background: #2EE59D; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1); border: none; border-radius: 5px; padding: 10px; "><a style="color: #fff; text-decoration: none; font-size: 20px; " href="http://localhost/MVC/public/home/verifyHome/'.$token .'">Verify Account</a></button>
                            <p>If you did not request a password reset, please ignore this email or contact support if you have question.</p>
                            <p>Thanks</p>
                            
                            
                        </div> 
                    </body>
                    </html>';  
    
            // Create a message
            $message = (new Swift_Message('Email Verification Required'))
            ->setFrom(['bayfrontweli45@gmail.com'=> 'BAYFRONT'])
            ->setTo([$userEmail])
            ->setBody($body, 'text/html');
        
            // Send the message
            $result = $mailer->send($message);
        }

        function sendPasswordResultLink($userEmail, $token , $userName)
        {
            
            // Create the Transport
                $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
                ->setUsername('bayfrontweli45@gmail.com')
                ->setPassword('Bayfront@1998')
            ;
            
            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            
            $body = ' <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <title>Verify Email</title>
                    </head>
                    <body>
                        <div class="wrapper" style=" border-radius: 2px;
                        height: auto;
                        background-color: black;
                        color: white;
                        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.3);
                        border: 2px solid black;
                        padding: 40px;
                        margin: 10px auto;
                        text-align: center;
                        position: relative;
                        width: 800px;">
                            <h1>Hi <strong> '. $userName .'</strong></h1>
                            <h3 class="top">You recently requested to reset your password for your BAYFRONT account Use the button below to reset it. <strong>This password reset is only valid for the next 24 hours.</strong></h3> 
                            <button style="background: #2EE59D; border: none; border-radius: 5px; padding: 10px; "><a style="color: #fff; text-decoration: none; font-size: 20px; " href="http://localhost/MVC/public/home/reset/'.$token .'">Reset Your Password</a></button>
                            <p>If you did not request new account, please ignore this email or contact support if you have question.</p>
                            <h4>Thanks</h4>
                            
                            
                        </div> 
                    </body>
                    </html>'; 

                // Create a message
            $message = (new Swift_Message('Reset Password Required'))
            ->setFrom(['bayfrontweli45@gmail.com'=> 'BAYFRONT'])
            ->setTo([$userEmail])
            ->setBody($body, 'text/html');
            
                // Send the message
            $result = $mailer->send($message);

        }
    
    }

    
    
    
    

?>