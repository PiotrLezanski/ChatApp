<?php 
    session_start();
    if(!isset($_SESSION['unique_id']))
    {
        header("location: login.php");
    }
?>

<?php include_once "header.php" ?>
<body>

    <div class="wrapper">
        <section class="chat-area">

            <header>

                <?php
                    include_once "php/config.php";

                    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                    // select all data about currently logged user
                    $sql = mysqli_query($conn, 
                                        "SELECT * FROM users WHERE unique_id = {$user_id}");

                    if(mysqli_num_rows($sql))
                    {
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>

                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $row['img'] ?>" alt="">
                <div class="details">
                    <span> <?php echo $row['first_name'] . " " . $row['last_name'] ?> </span>
                    <p> <?php echo $row['status'] ?> </p>
                </div>
            </header>

            <div class="chat-box">
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem impsum lorem ipsum lorem ipsum</p>
                    </div>
                </div>

                <div class="chat incoming">
                    <img src="image.jpg" alt="">
                    <div class="details">
                        <p>Lorem impsum lorem ipsum lorem ipsum</p>
                    </div>
                </div>

                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem impsum lorem ipsum lorem ipsum</p>
                    </div>
                </div>

                <div class="chat incoming">
                    <img src="image.jpg" alt="">
                    <div class="details">
                        <p>Lorem impsum lorem ipsum lorem ipsum</p>
                    </div>
                </div>

                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem impsum lorem ipsum lorem ipsum</p>
                    </div>
                </div>

                <div class="chat incoming">
                    <img src="image.jpg" alt="">
                    <div class="details">
                        <p>Lorem impsum lorem ipsum lorem ipsum</p>
                    </div>
                </div>

                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem impsum lorem ipsum lorem ipsum</p>
                    </div>
                </div>

                <div class="chat incoming">
                    <img src="image.jpg" alt="">
                    <div class="details">
                        <p>Lorem impsum lorem ipsum lorem ipsum</p>
                    </div>
                </div>
            </div>

            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="sender_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden> <!-- message sender -->
                <input type="text" name="receiver_id" value="<?php echo $user_id; ?>" hidden> <!-- message receiver -->
                <input type="text" name="message" class="input-field" placeholder="Write message here...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>

        </section>
    </div>

    <script src="javascript/chat.js"></script>

</body>
</html>