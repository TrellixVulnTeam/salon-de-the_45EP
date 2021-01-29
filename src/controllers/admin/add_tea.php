<?php

// Import des classes
use App\Core\ImageFileUploader;
// Si l'utilisateur n'est pas connecté
if (!isAuthenticated()) {
    header('Location: ' . buildUrl('/admin/login'));
    exit;
}

// Initialisation de la variable $error qui contiendra le cas échéant un message d'erreur
$error = null;


// Si le formulaire est soumis 
if (!empty($_POST)) {

    try {

        //   $userId = getUserSessionId();
        $title = $_POST['name'];
        $content = $_POST['description'];
        $categoryId = $_POST['category'];
        $image = basename($_FILES["fileToUpload"]["name"]);

        // $image = basename($_FILES["fileToUpload"]["name"]);

        $target_dir = PUBLIC_DIR . "/img/the/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        // File
        // $fileUploader = new ImageFileUploader('image');
        // $filename = $fileUploader->moveTempFile('upload/posts/');

        ///////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////// UPLOAD DE FICHIER ///////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }


        ///////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////// UPLOAD DE FICHIER ///////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////

        // Insertion de l'article en BDD
        $postModel = new \App\Models\TeaModel();
        $postId = $postModel->insertTea($title, $image, $content, $categoryId);


        $test = new \App\Models\TeaModel();
        $timeId = $test->lastTeaId();
       
        echo "$timeId";
        // Message flash de confirmation
          addFlashMessage('thé ajouté. ');

    //    header('Location: ' . buildUrl('/admin'));
        exit;
    } catch (Exception $exception) {
        $error = $exception->getMessage();
    }
}

$categoryModel = new \App\Models\TeaModel();
$categories = $categoryModel->getAllCategories();

render('admin/add_tea', [
    'categories' => $categories,
    'error' => $error
]);
