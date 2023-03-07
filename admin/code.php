<?php
include('security.php');


/* ADD Administrateur / Register */
if (isset($_POST['registerbtn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);

    if (mysqli_num_rows($email_query_run) > 0) {
        $_SESSION['status'] = "Email déjà enregisté.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    } else {
        if ($password === $cpassword) {
            $query = "INSERT INTO register (`username`,`email`,`password`,`usertype`) VALUES ('$username','$email','$password','$usertype')";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
                // echo "Saved";
                $_SESSION['status'] = "Administrateur ajouté";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            } else {
                $_SESSION['status'] = "Erreur ! l'Administrateur n'est pas ajouté";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');
            }
        } else {
            $_SESSION['status'] = "Le nouveau mot de passe et le mot de passe de confirmation ne correspondent pas";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');
        }
    }
}

/* EDIT Button Administrator List  */

if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertypeupdate = $_POST['update_usertype'];

    $query = "UPDATE register SET username='$username', email='$email', password='$password', usertype='$usertypeupdate' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Vos données sont éditées";
        $_SESSION['status_code'] = "success";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Erreur ! vos données ne sont pas éditées";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    }
}

/* DELETE Button Administrator List */

if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Vos données sont annulées";
        $_SESSION['status_code'] = "success";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Erreur ! Vos données ne sont pas annulées";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    }
}


/* ADD Partner List */
if (isset($_POST['save_partner'])) 
{
    $name = $_POST['partner_name'];
    $location = $_POST['partner_location'];
    $contact = $_POST['partner_contact'];
   

        $query = "INSERT INTO partner (`name`,`location`,`contact`) VALUES ('$name','$location','$contact')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) 
        {
         
            $_SESSION['success'] = "Vos données sont ajoutées";
            header('Location: partner.php');
        } else {
            $_SESSION['status'] = "Erreur ! Vos données ne sont pas ajoutées";
            header('Location: partner.php');
        }
}
/* EDIT Partner List  */

if (isset($_POST['edit_partner'])) 
{
    $id = $_POST['edit_id'];
    $name = $_POST['partner_name'];
    $location = $_POST['partner_location'];
    $contact = $_POST['partner_contact'];
  

    $query = "UPDATE partner SET name='$name', location='$location', contact='$contact' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Vos données sont enregistrées";
        header('Location: partner.php');
    } else {
        $_SESSION['status'] = "Vos données ne sont pas enregistrées";
        header('Location: partner.php');
    }
}

/* DELETE Partner List */

if (isset($_POST['delete_btn'])) 
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM partner WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Vos données sont annulées";
        header('Location: partner.php');
    }
    else 
    {
        $_SESSION['status'] = "Erreur ! Vos données ne sont pas annulées";
        header('Location: partner.php');
    }

}



/* LOGIN Page */

if (isset($_POST['login_btn'])) {
    $email_login = $_POST['emaill'];
    $password_login = $_POST['passwordd'];

    $query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login' LIMIT 1";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_fetch_array($query_run)) {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
    } else {
        $_SESSION['status'] = "Email ou Mot de passe invalide";
        header('Location: login.php');
    }
}



/* ADD Table List */

if (isset($_POST['save_table'])) {
    $name = $_POST['table_name'];
    $description = $_POST['table_description'];
    $formule = $_POST['table_formule'];
    $statut = $_POST['table_statut'];

    $query = "INSERT INTO tables (`name`,`description`,`formule`,`statut`) VALUES ('$name','$description','$formule','$statut')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Vos données sont ajoutées";
        header('Location: tables.php');
    } else {
        $_SESSION['status'] = "Erreur ! Vos données ne sont pas ajoutées";
        header('Location: tables.php');
    }
}



/* EDIT Tables List  */

if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $description = $_POST['edit_description'];
    $formule = $_POST['edit_formule'];
    $statut = $_POST['edit_statut'];


    $query = "UPDATE tables SET name='$name', description='$description ', formule='$formule', statut='$statut' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Vos données sont enregistrées";
        header('Location: tables.php');
    } else {
        $_SESSION['status'] = "Vos données ne sont pas enregistrées";
        header('Location: tables.php');
    }
}
/* DELETE Button Tables List */
if (isset($_POST['delete_btn'])) 
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM tables WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Vos données sont annulées";
        header('Location: tables.php');
    }
    else 
    {
        $_SESSION['status'] = "Erreur ! Vos données ne sont pas annulées";
        header('Location: tables.php');
    }

}

/* UPLOAD Profil Picture */
if(isset($_POST['submit']) && isset($_FILES['my_image'])) {
    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if ($error === 0) {
        if($img_size > 125000){
            $em = "Erreur, Votre image est trop lourde !";
            header("Location: profil.php?error=$em");
        }else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg","jpeg", "png");

            if (in_array($img_ex_lc,  $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true ).'.'. $img_ex_lc;
                $img_upload_path = 'uploads/'. $new_img_name;
                move_uploaded_file($tmp_name,  $img_upload_path);

                //insèrer dans la base de données
                $query = "INSERT INTO users(image) VALUES ($new_img_name)";
                mysqli_query($connection, $query);
                header("Location: profil.php");

            } else {
                $em = "Erreur, le format de l'image de convient pas !";
                header("Location: profil.php?error=$em");

            }
           
        }

    } else {
        $em = "Erreur chargement image !";
        header("Location: profil.php?error=$em");
    }

 
}
else 
{
    header("Location: profil.php");
}

?>



