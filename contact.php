<?php 
include 'header.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $name= htmlspecialchars(($_POST["name"]));
    $email=htmlspecialchars($_POST["email"]);
    $message= htmlspecialchars($_POST["message"]);
    $mail = new PHPMailer(true);

    try{
        //SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'jodonydunn@gmail.com';        
        $mail->Password   = '************';          
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        //recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('dunnalice9@gmail.com'); 

        $mail->isHTML(false);
        $mail->Subject = "New Contact Message from $name";
        $mail->Body = "Name: $name\nEmail: $email\nMessage:\n$message";
        
        $mail->send();
        echo "<p class='success'>Thank you, $name. Your message has been sent!</p>"; //if successful
    } catch (Exception $e) {
        echo "<p class='success' style='color:red;'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p>"; //if unsuccessful
    }
}
?>
<!-- contact page-->
<section class="contact">
    <h1>Contact Us</h1>
    
    <div class="contact-container">
        <div class="contact-form">
            <!--contact information-->
            <div>
                <p><strong>Location:</strong>📍 May Pen, Clarendon, Jamaica</p>
                <p><strong>Email:</strong> 📧 blazebeautyschool@gmail.com</p>
                <p><strong>Phone:</strong> 📱876-869-3164</p>
            </div>

            <!-- contact form-->
            <form method="POST" action="">
                <label>Full Name</label>
                <input type="text" name="name" required />

                <label>Email</label>
                <input type="email" name="email" required/>

                <label>Telephone Number</label>
                <input type="text" name="phone" required />

                <label>Message</label>
                <textarea name="message" required></textarea>

                <button type="submit">Send</button>
                <a href="https://wa.me/18768693164?text=Hi%20Blaze%20Beauty%20School!%20I'd%20like%20to%20get%20some%20information" target="_blank" rel="noopener">
                    <button type="button" id="b">📱 Message Us on WhatsApp</button>
                </a>
            </form>

           
        </div>

        <!-- location map-->
        <div class="location">
            <h2>Visit Us</h2>
            <p>We are located at 📍<strong>May Pen, Clarendon, Jamaica</strong></p>

            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3922.3582567685196!2d-77.25171368462207!3d17.978071393956996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ed4d097c82eabf7%3A0x7bdf30fa64e5794f!2sMay%20Pen%2C%20Clarendon%2C%20Jamaica!5e0!3m2!1sen!2sjm!4v1720467895000"
                    width="100%"
                    height="300"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"> 
                </iframe>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>
</main>
</body>
</html>
