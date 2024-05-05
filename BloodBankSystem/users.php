<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div>
        <?php

            if(isset($_POST['submit']))
            {
                $name = $_POST['name'];
                $blood_group = $_POST['blood_group'];
                $availability = $_POST['availability'];
                $location = $_POST['location'];
                $contact = $_POST['contact'];

                require_once 'database.php';

                $sql = "INSERT INTO users (name, blood_group, availability, location, contact) VALUES ('$name', '$blood_group', '$availability', '$location', '$contact')";

                $result = mysqli_query($conn, $sql);

                if($result)
                {
                    echo "Data inserted successfully";
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
                <input type="text" name="name" required placholder="Write name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Blood Group</label>
                <input type="text" name="blood_group" required placholder="Write Blood Group" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Availability</label>
                <input type="num" name="availability" required placholder="Write Availability number" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Location</label>
                <input type="text" name="location" required placholder="Write location" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Contact</label>
                <input type="text" name="contact" required placholder="Write contact" class="form-control">
            </div>
            <div class="form-btn">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>