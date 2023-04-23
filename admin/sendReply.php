<?php
include_once('../connect.php');

$messageid = $_POST['messageid'];
$message = $_POST['message'];
$mess_status = $_POST['mess_status'];
$catid = $_POST['catid'];
$id = $_POST['id'];
$recipient_catid = $_POST['recipient_catid'];
$recipient_id = $_POST['recipient_id'];
$mess_status = $_POST['mess_status'];
$now = $_POST['now'];
$mess_status = 0;

$sql = "INSERT INTO tbl_message (message, date, catid, id, recipient_catid, recipient_id, mess_status) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($database, $sql);

// Bind parameters (example)
mysqli_stmt_bind_param($stmt, "sssssss", $message, $now, $catid, $id, $recipient_catid, $recipient_id, $mess_status);

//update the message status of messageid into 1
$sql1 = "UPDATE tbl_message SET mess_status = 1 WHERE messageid = ?";
$stmt1 = mysqli_prepare($database, $sql1);
mysqli_stmt_bind_param($stmt1, "s", $messageid);
mysqli_stmt_execute($stmt1);

// Execute the query (example)
if (mysqli_stmt_execute($stmt)) {
    // Query executed successfully add bootstrap alert and remove after 3 seconds
    echo "<div class='alert alert-success' role='alert'>Message sent successfully!</div>";
    echo "<script>setTimeout(function(){ $('.alert').alert('close'); }, 3000);</script>";
    //bring back the containt
    echo '<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <img src="../img/undraw_profile.svg" class="img-fluid">
            </div>
            <div class="col-md-10">
                <p id="messid">ID</p>
                <h5 id="name">Fullname</h5>
                <p id="message">Message</p>
                <small id="time">Time</small>
                <input type="hidden" id="id" value="<?php echo $adminid ?>">
                <input type="hidden" id="catid" value="0">
                <input type="hidden" id="recipient_id" value="<?php echo $id?>">
                <input type="hidden" id="recipient_catid" value="<?php echo $catid ?>">
                <input type="hidden" id="mess_status" value="<?php echo $mess_status ?>">
                <input type="hidden" id="now" value="<?php echo $now ?>">
            </div>
        </div>
        <hr>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input type="text" class="form-control" id="reply" placeholder="Type your message here...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="sendReply">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';
    
} else {
    // Query execution failed add bootstrap alert
    echo "<div class='alert alert-danger' role='alert'>Message not sent!</div>";
    echo "<script>setTimeout(function(){ $('.alert').alert('close'); }, 3000);</script>";
    echo '<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <img src="../img/undraw_profile.svg" class="img-fluid">
            </div>
            <div class="col-md-10">
                <p id="messid">ID</p>
                <h5 id="name">Fullname</h5>
                <p id="message">Message</p>
                <small id="time">Time</small>
                <input type="hidden" id="id" value="<?php echo $adminid ?>">
                <input type="hidden" id="catid" value="0">
                <input type="hidden" id="recipient_id" value="<?php echo $id?>">
                <input type="hidden" id="recipient_catid" value="<?php echo $catid ?>">
                <input type="hidden" id="mess_status" value="<?php echo $mess_status ?>">
                <input type="hidden" id="now" value="<?php echo $now ?>">
            </div>
        </div>
        <hr>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input type="text" class="form-control" id="reply" placeholder="Type your message here...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="sendReply">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';
}

?>