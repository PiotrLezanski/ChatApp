<?php
    session_start();
    include_once "config.php";
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password))
    {
        // validate email
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");

            // if email already exists
            if(mysqli_num_rows($sql) > 0)
            {
                echo "$email - This email already exists";
            }
            else
            {
                if(isset($_FILES['image']))
                {
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extensions = ['png', 'jpeg', 'jpg'];

                    if(in_array($img_ext, $extensions) === true)
                    {
                        $time = time(); // return current time, so all image files will have unique name
                        $new_img_name = $time.$img_name;

                        if(move_uploaded_file($tmp_name, "images/".$new_img_name))
                        {
                            $status = "Active now";
                            $random_id = rand(time(), 10000000); // create random id for user

                            // insert user data
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, first_name, last_name, email, password, img, status)
                                                        VALUES ({$random_id}, '{$first_name}', '{$last_name}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");

                            if($sql2)
                            {
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0)
                                {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                }
                            }
                            else
                            {
                                echo "Something went wrong!";
                            }
                        }
                    }
                    else
                    {
                        echo "Please pick image with entensions jpeg, jpg or png!";
                    }
                }
                else
                {
                    echo "Please select an Image file!";
                }
            }
        }
        else
        {
            echo "$email - Enter a valid email";
        }
    }
    else 
    {
        echo "Fill required input fields";
    }
?>