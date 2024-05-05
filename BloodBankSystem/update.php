<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div>
        <?php
            require_once 'database.php';
            
            $id = $_GET['updateid'];
            $sql = "SELECT * FROM users WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($result);
            $name = $data['name'];
            $blood_group = $data['blood_group'];
            $availability = $data['availability'];
            $location = $data['location'];
            $contact = $data['contact'];

            if(isset($_POST['submit']))
            {
                $name = $_POST['name'];
                $blood_group = $_POST['blood_group'];
                $availability = $_POST['availability'];
                $location = $_POST['location'];
                $contact = $_POST['contact'];

                $sql = "UPDATE users SET name = '$name', blood_group = '$blood_group', availability = '$availability', location = '$location', contact = '$contact' WHERE id = '$id'";

                $result = mysqli_query($conn, $sql);

                if($result)
                {
                    header('location:show.php');
                    // echo "Data updated successfully";
                }
                else
                {
                    die(mysqli_error($conn));
                }
            }

        ?>
        <form method="post" style="margin:30px">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" required placholder="Write name" class="form-control" value=<?php echo $name ?>>
            </div>
            <div class="form-group">
                <label for="">Blood Group</label>
                <input type="text" name="blood_group" required placholder="Write Blood Group" class="form-control" value=<?php echo $blood_group ?>>
            </div>
            <div class="form-group">
                <label for="">Availability</label>
                <input type="num" name="availability" required placholder="Write Availability number" class="form-control" value=<?php echo $availability ?>>
            </div>
            <div class="form-group">
                <label for="">Location</label>
                <input type="text" name="location" required placholder="Write location" class="form-control" value=<?php echo $location ?>>
            </div>
            <div class="form-group">
                <label for="">Contact</label>
                <input type="text" name="contact" required placholder="Write contact" class="form-control" value=<?php echo $contact ?>>
            </div>
            <div class="form-btn">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>