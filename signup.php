 <?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <div class="headerSection">
        <header>REGISTER</header>
        <label for="theme-toggle" id="theme-toggle-icon">
             <i class="fa-solid fa-moon"></i>
        </label>
         <input type="checkbox" class="theme-toggle" id="theme-toggle">
      </div>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fa-solid fa-eye"></i> 
        </div>
        <div class="field image">
          <label>Select Image  <input type="file" name="image" class = "file-input" accept="image/x-png,image/gif,image/jpeg,image/jpg" required><i class="fa-solid fa-image"><span class="file-name">No file chosen</span></i></label>          
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Already signed up? <a class="hover-underline-animation" href="login.php">Login now</a></div>
    </section>
  </div>
  <script src = "javascript\fileInput.js"></script>
  <script src="javascript/themeMode.js"></script>
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>
 
</body>
</html>
