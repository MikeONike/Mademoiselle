<?php
$address_01 = get_option('mademoiselle_contact_address_01');
$address_02 = get_option('mademoiselle_contact_address_02');
$phone_no_01 = get_option('mademoiselle_contact_phone_number_01');
$phone_no_02 = get_option('mademoiselle_contact_phone_number_02');
$mobile_no_01 = get_option('mademoiselle_contact_mobile_number_01');
$mobile_no_02 = get_option('mademoiselle_contact_mobile_number_02');
$email_01 = get_option('mademoiselle_contact_email_01'); 
$email_02 = get_option('mademoiselle_contact_email_02'); 
?>
<section class="contact-info">
<?php
if(!empty($address_01)) {
    ?>
            <p>
                <span><?php echo $address_01; ?></span>
            </p>
    <?php
}
if(!empty($address_02)) {
    ?>
            <p>
                <span><?php echo $address_02; ?></span>
            </p>
    <?php
}
if(!empty($phone_no_01)) {
    ?>
            <p>
                <span><?php echo $phone_no_01; ?></span>
            </p>
    <?php
}
if(!empty($phone_no_02)) {
    ?>
            <p>
                <span><?php echo $phone_no_02; ?></span>
            </p>
    <?php
}
if(!empty($mobile_no_01)) {
    ?>
            <p>
                <span><?php echo $mobile_no_01; ?></span>
            </p>
    <?php
}
if(!empty($mobile_no_02)) {
    ?>
            <p>
                <span><?php echo $mobile_no_02; ?></span>
            </p>
    <?php
}
if(!empty($email_01)) {
    ?>
            <p>
                <span><?php echo $email_01; ?></span>
            </p>
    <?php
}
if(!empty($email_02)) {
    ?>
            <p>
                <span><?php echo $email_02; ?></span>
            </p>
    <?php
}
?>
</section>