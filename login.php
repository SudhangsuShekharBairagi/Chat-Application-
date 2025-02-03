<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
    <div class="headerSection">
        <header>WELCOME BACK <BR>LOGIN</BR></header>
        <label for="theme-toggle" id="theme-toggle-icon">
             <i class="fa-solid fa-moon"></i>
        </label>
         <input type="checkbox" class="theme-toggle" id="theme-toggle">
      </div>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i id="themeMode" class="fa-solid fa-eye"></i> 
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Not yet signed up? <a class="hover-underline-animation" href="signup.php">Signup now</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>
  <script src="javascript/themeMode.js"></script>
</body>
</html>
