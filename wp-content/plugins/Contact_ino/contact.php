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
    <input type="text" name="name" size="40" />
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

// add_action( 'the_content', 'Form_Contact_Us' );
add_shortcode( 'the_content', 'Form_Contact_Us' );

?>