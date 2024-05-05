<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div>
        <?php

           
        ?>

        <div>
            <button class=""><a href="users.php">Add User</a></button>
        </div>
        <div style="padding: 10px">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Availability</th>
                        <th scope="col">Location</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                        require_once 'database.php';

                        $sql = "SELECT * FROM users";

                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

                            foreach ($row as $data) {
                                echo "<tr>";
                                echo "<td>".$data['id']."</td>";
                                echo "<td>".$data['name']."</td>";
                                echo "<td>".$data['blood_group']."</td>";
                                echo "<td>".$data['availability']."</td>";
                                echo "<td>".$data['location']."</td>";
                                echo "<td>".$data['contact']."</td>";
                                echo "<td><button class='btn btn-primary'><a href='update.php?updateid=".$data['id']."' style='color: white;'>Update</a></button></td>";
                                echo "<td><button class='btn btn-danger'><a href='delete.php?deleteid=".$data['id']."' style='color: white;'>Delete</a></button></td>";
                                echo "</tr>";
                            }
                        }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>