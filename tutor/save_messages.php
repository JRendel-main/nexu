<?php
            // Get the tutor's schedule
            $catid = 1;
            $tutorid = $_POST['tutorid'];
            $message = $_POST['message'];
            // get if post submitted
            if (isset($_POST['submit'])) {
                // get date and time now
                $date = date('Y-m-d');
                $time = date('H:i:s');

                $datetime = $date.$time;
                // get the message and image
                $message = $_POST['message'];
                $image = $_FILES['image']['name'];
                // change the name of image to datetime and save to folder
                $image = date('YmdHis').$image;
                $target = "../img/".$image;
                move_uploaded_file($_FILES['image']['tmp_name'], $target);
                // get the directory and save to database
                $image = "http://localhost/img/".$image;
                // insert the message and image to the database
                $sql = "INSERT INTO tbl_message (id, catid, message, image, date) VALUES ('$tutorid', '$catid', '$message', '$image', '$datetime')";
                $result = mysqli_query($database, $sql);
                // check if the message inserted
                if ($result) {
                    // display success message
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Your message has been sent.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                        header('index.php');
                } else {
                    // display error message
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Your message could not be sent.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                }
            }
            ?>