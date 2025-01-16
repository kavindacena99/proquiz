<?php
    require_once 'connection/connection.php';
?>
<?php
    session_start();

    if(!isset($_SESSION['user_id'])){
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Proquiz Leaderboard <a href="index.php" style="text-decoration: none;">Home</a></h1>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">Rank</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Marks</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM users ORDER BY marks DESC";
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                $rank = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$rank}</td>
                            <td>{$row['fname']}</td>
                            <td>{$row['lname']}</td>
                            <td>{$row['marks']}</td>
                        </tr>";
                    $rank++;
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>No results found</td></tr>";
            }
        ?>
        </tbody>
    </table>
</div>

<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
