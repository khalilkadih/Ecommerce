<?php

/*
plugin Name:Contact_Form
Pligin URI:http://khalil_Form.php
Description : this plugin help you to contact support of our store
Version:1.0
Author:khalil el kadih
Author URI:http://khalilelkadih.dev
Licence:2GBP
Licence URI:http://google.com
Text Domain:  wpb-Contact_Form
*/

function Form_Contact_Us() 
{
    ?>
   <form action="" method="post">
    <p>
    Your Name (required) <br />
    <input type="text" name="name" size="40"  id="name"/>
    </p>
    <p>
    Your Email (required) <br />
    <input type="email" name="email"  size="40" />
    </p>
    <p>Subject (required) <br />
        <input type="text" name="subject"  size="40" />
    </p>
    <p>
    Your Message (required) <br />
    <textarea rows="10" cols="35" name="message"> taper votre message Ici</textarea>
    </p>
    <p><input type="submit" name="submit" value="Send Message"/></p>
    </form>
    <?php
}

add_action( 'the_content', 'Form_Contact_Us' );
add_shortcode( 'the_content', 'Form_Contact_Us' );

if ( isset( $_POST['cf-submitted'] ) ) {
    // sanitize form values
    $name    =  $_POST["name"] ;
    $email   =$_POST["email"] ;
    $subject = $_POST["subject"] ;
    $message = $_POST["message"] ;
    saveDataToTable($email,$name,$message,$subject);?>
    
 
    <div class="alert alert-success" style="font-weight:bold;border:sloid black 1px;border-radius: 5px">
        message sent to admins!
    </div>
    <?php
    add_action('activate_contact-us-test/contact.php',function(){
        $wpdb->query("CREATE TABLE IF NOT EXISTS `ecommerce`.`wp_contact_plugin` ( `id` INT NOT NULL AUTO_INCREMENT , `email` TEXT NOT NULL , `name` TEXT NOT NULL , `subject` TEXT NOT NULL , `message` TEXT NOT NULL");
    
    });
    
    add_action('deactivate_contact-us-test/contact.php',function(){
        $wpdb->query("INSERT INTO `wp_contact_plugin` (`email`, `name`, `subject`, `message`) VALUES (NULL, '{$email}', '{$name}', '{$subject}', '{$subject}');");
    
    });
}
echo 'Your Message send successfully';



?>