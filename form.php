<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Formularvalidierung</title>
    <link href="style.css" rel="stylesheet">

</head>
 <?php

/**
 * Prüft ob ein Fehler für ein Feld existiert
 *
 * @param array  $errors
 * @param string $key
 *
 * @return bool
 */
function hasError (array $errors, string $key): bool
{
    return array_key_exists($key, $errors);
}

/**
 * Gibt einen Fehler aus.
 *
 * @param array  $errors
 * @param string $key
 */
function renderError (array $errors, string $key)
{
    if (hasError($errors, $key)) {
        echo "<p class=\"error\">" . $errors[$key] . "</p>";
    }
}

/**
 * Gibt eine HTML Klasse aus, wenn ein Fehler für das Feld existiert
 *
 * @param array  $errors
 * @param string $key
 */
function errorClass (array $errors, string $key)
{
    if (hasError($errors, $key)) {
        echo ' form-group--has-error';
    }
}

if (!isset($errors)) {
    $errors = [];
}

?> 
<body>
    <div class="wrapper">
        <div class="title">
            Contact us
        </div>

        <form action="index.php?page=form-validate" method="post" novalidate>
            <div class="form <?php errorClass($errors, 'firstname'); ?>">
                <div class="inputfield">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" placeholder="First Name" value="<?php if (isset($_POST['firstname'])) {
                echo $_POST['firstname'];
            } ?>">
                     <?php renderError($errors, 'firstname'); ?>
                </div>
                <div class="inputfield">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Last Name" class="input">
                    <span class="error-message-lasttname"></span>
                </div>
                <div class="inputfield">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" placeholder="Telephone" class="input">
                    <span class="error-message-tel"></span>
                </div>
                <div class="inputfield">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Email" autocomplete="shipping email"
                        class="input">
                    <span class="error-message-email"></span>
                </div>
                <div class="inputfield">
                    <label>My Question</label>
                    <div class="custom_select">
                        <select>
                            <option value="select">Select</option>
                            <option value="orders">Orders and Shipment</option>
                            <option value="payment">Payment and Returns</option>
                            <option value="products">Products</option>
                            <option value="complaint">Complaint</option>
                            <option value="more">More</option>
                            <span class="questionErr"><span>
                        </select>
                    </div>
                </div>
                <div class="inputfield">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="7" placeholder="Message.." maxlength=1000></textarea>
                    <span class="error-message-comment"></span>
                </div>
                <div class="gender">
                    <input type="radio" name="gender" value="woman"> Woman
                    <input type="radio" name="gender" value="man"> Man
                    <input type="radio" name="gender" value="non-binary"> Non-binary
                    <span class="error-message-gender"></span>
                </div>
                <div class="inputfield terms">
                    <label class="check">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <p>Agreed to terms and conditions</p>
                </div>
                <div class="inputfield">
                    <input type="submit" value="Submit" class="btn">
                </div>
            </div>
    </div>

    </form>
</body>

</html>