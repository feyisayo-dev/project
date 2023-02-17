
<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit();
}
?>
<?php
include('db.php');
$UserId = $_SESSION['UserId'];
?>

<!-- rest of your HTML code -->
<!DOCTYPE html>
<html>
    <head>
        <title>
          Share a Post
        </title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="js/jquery.min.js"></script>
  <script src="country-states.js"></script>
  <link rel="icon" href="img\offeyicial.jpeg" type="image/jpeg" sizes="32x32" />
    <style>
      /* Add mobile-friendly styles */
      @media (max-width: 500px) {
        body {
            font-size: 12px;
        }
        #title, #content {
            width: 100%;
        }
        .title_container strong {
            font-size: 30px;
            width: 100%;
        }
        .form-group {
            padding: 0.5rem;
        }
        .custom-body .submit, .custom-body .profile {
            width: 100%;
        }
      }

      #title{
        background: white;
        /* padding: 0.5rem 0.7rem; */
        width: 50%;
        border: 1px solid #ccc;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.95rem;
      }

      #content{
        background: white;
        /* padding: 0.5rem 0.7rem; */
        width: 50%;
        border: 1px solid #ccc;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.95rem;
      }
      .container{
          border: none;
          padding: 2cm;
          background: transparent;
      }
      .custom-body {
        background: white;
        width:100%;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        background-image: url(img/19.jpeg); 
          background-size: cover;
      }

      .custom-body .form-group {
        font-family: 'Calligraffitti';
        background: transparent;
        padding: 1rem;
        border-radius: 10px;
        margin-bottom: 1rem;
      }

      .custom-body label {
        font-size: 1.2rem;
        font-weight: 600;
        color: white;
      }

      .custom-body input,
      .custom-body textarea {
        padding: 0.5rem;
        border-radius: 4px;
        border: none;
        font-size: 1rem;
        margin-top: 0.5rem;
      }
          .custom-body .submit {
            background: black;
          color: white;
          font-size: 1.2rem;
          padding: 0.5rem 1rem;
          border-radius: 4px;
          border: none;
          margin-top: 1rem;
          }

          .custom-body .submit:hover {
          cursor: pointer;
          opacity: 0.8;
          }
          .form-group #image {
          width: 100%;
          height: auto;
          border-radius: 4px;
          }

          .form-group #image:hover {
          opacity: 0.8;
          cursor: pointer;
          }
          .title_container {
              margin-bottom: 20px;
          }
          strong {
            color: pink;
            font-family: 'Calligraffitti'; /* sets text color to red */
            font-size: 50px; /* sets font size to 20px */
            text-align: center; /* centers the text */
          background: transparent;
          width:50%; 
          }
          .custom-body .profile {
            background: black;
          color: white;
          font-size: 1.2rem;
          padding: 0.5rem 1rem;
          border-radius: 4px;
          border: none;
          margin-top: 1rem;
          width:170px; 
          }

          .custom-body .profile:hover {
          cursor: pointer;
          opacity: 0.8;
          }
          .navbar-nav a {
            font-size: 15px;
            text-transform: uppercase;
            font-weight: 500;
        }
        
        .navbar-light .navbar-brand {
            color: #000;
            font-size: 25px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 2px;
        }
        
        .navbar-light .navbar-brand:focus,
        .navbar-light .navbar-brand:hover {
            color: #000;
        }
        
        .navbar-light .navbar-nav .navbar-link {
            color: #000;
        }
        .custom-link {
  text-decoration: none;
  cursor: pointer;
}

        </style>
    </head>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="home.php">Offeyicial<span class="text-success"> Chat Room </span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navmenu" aria-controls="navmenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="home.php"><i class="bi bi-house-door"></i>Home</a>
                </li>
                <li class="nav-item">
				<a class="nav-link custom-link"onclick="window.location.href='search.php?UserId=<?php echo $UserId; ?>'">Search</a>
                </li>
                <li class="nav-item">
				<a class="nav-link custom-link" onclick="window.location.href='user_profile.php?UserId=<?php echo $UserId; ?>'">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.php"><i class="bi bi-telephone"></i>Contact us</a>
                </li>

        </div>
    </nav>
    <body class="custom-body">
        <div class="container">
            <div class="title_container">
                <strong>Unleash Your Creativity!</strong>
            </div>
            <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <div class="form-group">
  <label for="video">Video:</label>
  <input type="file" id="video" name="video" accept="video/*">
</div>

            <input type="submit" value="Add Post" class="submit">
            <input class="profile" value="Back to profile" onclick="window.location.href='user_profile.php?UserId=<?php echo $UserId; ?>'">
        </div>
    </body>
    <script src="js/jquery.min.js"></script>  

<script>
$(document).ready(function(){
    $('.submit').click(function(){
        var title = $('#title').val();
        var content = $('#content').val();
        var image = $('#image').prop('files')[0];
        var video = $('#video').prop('files')[0];

        var form_data = new FormData();
        form_data.append('title', title);
        form_data.append('content', content);
        form_data.append('image', image);
        form_data.append('video', video);


        $.ajax({
            url: 'addpost.php', // point to server-side PHP script 
            dataType: 'text',  // what to expect back from the PHP script
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(response){
              if(response === "success"){
                  console.log("Post added successfully");
                  alert("Post added successfully");
              }else{
                  console.log("Error adding post: " + response);
                  alert("Error adding post: " + response);
              }
          }

        });
        
    });
});


</script>

</html>