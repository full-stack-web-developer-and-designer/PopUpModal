<!DOCTYPE html>
<html lang="en">
<head>
  <title>JS Modal with Contact Form</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="style.css" rel="stylesheet" type="text/css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="author" content="Mirnes Glamočić">
  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <!--jQuery validate plugin -->
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script> 
  <script defer src="script.js"></script>
</head>
<body>
  <button data-modal-target="#modal" class="button">Click hiere</button>
  <div class="modal" id="modal">
      <div class="modal-header">
        <h2>Contact me</h2>
        <button data-close-button class="close-button">&times;</button>
      </div><!-- end .modal-header -->
    <div class="modal-body">
    <?php
include 'form_process.php';
?>
<form  spellcheck="false" autocomplete="off" id='contact_me' class='form ajax' name='contact_me' action='' method='POST'> 
<h4 id="response" class="success"><!-- This will hold response from the server --></h4>
        <fieldset>
            <legend>Personal data</legend>
					<div class="form-control halb"><input type="text" class="input username" name="name" id="name" placeholder="Your name..." value="<?php if (isset($_POST['name'])) {echo htmlentities($_POST['name']);} ?>"><span class="error" id="name_error_message"><?=$name_error; ?></span></div><!-- end .form-control -->
					
					<div class="form-control halb"><input type="text" class="input mail" name="email" id="email" placeholder="Your e-mail..." value="<?php if (isset($_POST['email'])) {echo htmlentities($_POST['email']);}?>"autocomplete="off"><span class="error"><?=$email_error;?></span></div><!-- end .form-control -->
					
					<div class="form-control"><textarea maxlength="500" name="message" class="textinput message" cols="46" rows="8" id="message" placeholder="Your message..."><?php if (isset($_POST['message'])) {echo htmlentities($_POST['message']);} ?></textarea><span class="error"><?= $message_error; ?></span></div><!-- end .form-control -->
			   </fieldset>
			  <input type="submit" id="submit" class="btn_submit" name="submit" value="SEND" /></form>
<script src="form_color.js"></script>
<script src="validate_me.js"></script>
      </div><!-- end .modal-body -->
      <div class="modal-footer">
        <h3>Developed by Mirnes Glamočić</h3>
      </div><!-- end .modal-footer -->
  </div><!-- end .modal-body -->
  <div id="overlay"></div><!-- end #overlay -->
</body>
</html>