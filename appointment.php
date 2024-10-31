<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('smtp/PHPMailerAutoload.php');

function smtp_mailer($to, $subject, $message) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "jadhavaryan467@gmail.com"; // Your email
    $mail->Password = "oozzyqfwnpufjuqi"; // Your email password
    $mail->SetFrom("jadhavaryan467@gmail.com"); // Your email
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    
    return $mail->Send() ? 'Sent' : $mail->ErrorInfo;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mailid = $_POST['email'];
    $depart = $_POST['department'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $doc = $_POST['doctor'];
    $subject = "New Appointment";
    $det = $_POST['message'];
    
    $message = "
    <html>
    <head>
        <title>New Mail Enquiry</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; }
            .container { max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
            h2 { color: #333; }
            table { width: 100%; border-collapse: collapse; margin-top: 20px; }
            th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
            th { background-color: #f2f2f2; }
            .footer { margin-top: 20px; font-size: 0.9em; color: #777; }
        </style>
    </head>
    <body>
        <div class='container'>
            <h2>New Appointment from $mailid</h2>
            <table>
                <tr>
                    <th>Patient Information</th>
                    <th>Appointment Details</th>
                </tr>
                <tr>
                    <td>
                        <p><strong>Name:</strong> $name</p>
                        <p><strong>Phone:</strong> $phone</p>
                    </td>
                    <td>
                        <p><strong>Date:</strong> $date</p>
                        <p><strong>Time:</strong> $time</p>
                    </td>
                </tr>
                <tr>
                    <th colspan='2'>Consultation Details</th>
                </tr>
                <tr>
                    <td colspan='2'>
                        <p><strong>Department:</strong> $depart</p>
                        <p><strong>Doctor:</strong> $doc</p>
                        <p><strong>Details from patient:</strong> $det</p>
                    </td>
                </tr>
            </table>
            <div class='footer'>
                <p>This email was sent from your website Appointment form.</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    $to = 'aryanjadhav686@gmail.com';
    $result = smtp_mailer($to, $subject, $message);

    // Modal trigger script
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
    </head>
    <body>
    ";

    if ($result === 'Sent') {
        echo "
        <div class='modal fade' id='successModal' tabindex='-1' role='dialog' aria-labelledby='successModalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='successModalLabel'>Appointment Confirmation</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body text-center'>
                        <i class='fas fa-check-circle' style='font-size: 50px; color:  #1A76D1;'></i>
                        <p>Your appointment mail has been sent successfully!</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' onclick=\"window.location.href='index.html';\">Back</button>
                    </div>
                </div>
            </div>
        </div>
        <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
        <script>
            $(document).ready(function() {
                $('#successModal').modal('show');
            });
        </script>
        ";
    } else {
        echo "<script>alert('Mail sending failed: " . $result . "');</script>";
    }

    echo "
    </body>
    </html>
    ";
}
?>
