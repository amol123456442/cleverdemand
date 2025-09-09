<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>

<h2>Contact Us</h2>

<?php echo validation_errors(); ?>
<?php echo form_open('contact/submit'); ?>

    <label>Name:</label><br>
    <input type="text" name="name"><br><br>

    <label>Email:</label><br>
    <input type="text" name="email"><br><br>

    <label>Message:</label><br>
    <textarea name="message"></textarea><br><br>

    <input type="submit" value="Send">

</form>

</body>
</html>
