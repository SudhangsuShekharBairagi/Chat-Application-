<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="" ondblclick =<?php echo $row['fname']?> >
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
      
        <a class="hover-underline-animation" href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
        <label for="theme-toggle" id="theme-toggle-icon">
             <i class="fa-solid fa-moon"></i>
        </label>
         <input type="checkbox" class="theme-toggle" id="theme-toggle">
      </header>
      <!-- <i id="themeMode" class="fa-solid fa-sun"></i> -->
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i id="themeMode" class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

            
      </div>
  
    </section>
  </div>

  <script src="javascript/users.js"></script>
  <script src="javascript/themeMode.js"></script>
</body>
</html>
