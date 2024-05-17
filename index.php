<?php include_once "header.php"; ?>
<body>

    <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat App</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt">error message!</div>
                <div class="name-details">
                    
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="first_name" placeholder="First Name" required>
                    </div>

                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="last_name" placeholder="Last Name" required>
                    </div>
                
                </div>

                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>

                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <i class="fas fa-eye"></i>
                </div>

                <div class="field image">
                    <label>Select image</label>
                    <input type="file" name="image" required>
                </div>

                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>
                
            </form>

            <div class="link">Already signed up? <a href="login.php">Go to login</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>

</body>
</html>