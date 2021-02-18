<?php
/*
Template Name: contact
*/
$errors = array();
$success = false;
if (!empty($_POST['submitted'])) {

	$sujet = trim(strip_tags($_POST['sujet']));
	$email = trim(strip_tags($_POST['email']));
	$message = trim(strip_tags($_POST['message']));

	$errors = checkField($errors,$sujet,'sujet',5,120);
	$errors = checkEmail($errors,$email,'email',8,70);
	$errors = checkField($errors,$message,'message',10,1000);
	// debug($errors);
	if(count($errors) == 0) {
		$current_date = date("Y-m-d H:i:s");
        // insert INTO  =>
		$wpdb->insert( 
			'wpcd_contacts', 
			array(
				'sujet' => $sujet, 
				'email' => $email,
				'message' => $message,
				'created_at'=> $current_date,
			), 
			array( 
				'%s', 
				'%s',
				'%s', 
				'%s',
			) 
		);
		$success=true;
      }
}

get_header();
?>
<main id="primary" class="site-main contact">
<h3 class="h3-anim">Nous Contacter</h3>
<?php if ($success==false) { ?>

	<form class="formulaire wrap2" action="" method="post">
		<input type="text" id="sujet" name="sujet" value="<?php if(!empty($_POST['sujet'])) {echo $_POST['sujet'];} ?>" placeholder="Sujet">
		<span class="error"><?php if(!empty($errors['sujet'])) {echo $errors['sujet']; } ?></span>

		<input type="text" id="email" name="email" value="<?php if(!empty($_POST['email'])) {echo $_POST['email'];} ?>" placeholder="Email">
		<span class="error"><?php if(!empty($errors['email'])) {echo $errors['email']; } ?></span>
		
		<textarea type="text" id="message" name="message" value="<?php if(!empty($_POST['message'])) {echo $_POST['message'];} ?>" placeholder="Message"></textarea>
		<span class="error"><?php if(!empty($errors['message'])) {echo $errors['message']; } ?></span>
		
		<input type="submit" name="submitted" value="Envoyer">

	</form>
	<?php }else{ ?>
		<div>
			<h2 class="success"> Votre message est bien envoyé</h2>
		</div>
	<?php } ?>

</main><!-- #main -->

<?php
get_footer();
