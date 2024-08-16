
<a href="index.html"><span class=" name-caret"><?php echo $_SESSION['username'];?></span></a>
                    <p><?php echo $_SESSION['role'];?></p>
                    <ul>
                        <li><a class="tooltips" href="changePassword.php"><span>Profile</span><i class="fa fa-user"></i></a></li>
                        <li><a class="tooltips" href="home.php"><span>Home</span><i class="fa fa-th-large"></i></a></li>
                        <li><a class="tooltips" href="logout.php"><span>Log out</span><i class="fa fa-sign-out"></i></a></li>
                    </ul>
