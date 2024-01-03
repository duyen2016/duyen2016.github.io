<?php
    include 'getdataesp32.php';
?>
<?php 
    require_once('connect.php');
    $query = "SELECT * from user_log JOIN user ON user_log.userID = user.userID;";
    $result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style_dashboard.css">
    <title>STM32 using</title>
</head>

<header>
    <div>
        <h1 id="title_stm32">STM32 - Fingerfrint & Card</h1>
    </div>
</header>

<body>
    <div class ="container_select">
        <button>Users Log</button>
    </div>

    <div class ="container_select">
        <button id="user_list">Users</button>
    </div>

    <div class ="container_select">
        <button id="add_user">Manage Users</button>
    </div>

    <div class="container" id="container">
        <div class="table-container">
            <table id="show_element">
                <thead>
                    <tr id="colum">
                        <th>Log ID</th>
                        <th>User Name</th>
                        <th>Code ID</th>
                        <th>Log Type</th>
                        <th>Date Time</th>
                    </tr>
                </thead>
                    <?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                    ?>        
                            <tr>
                                <td> <?php echo $row['logID']; ?></td>
                                <td> <?php echo $row['name']; ?></td>
                                <td> <?php echo $row['fingerID']; ?></td>
                                <td> <?php echo $row['log_type']; ?></td>
                                <td> <?php echo $row['checkin_time']; ?></td>
                            </tr>
                    <?php
                        }
                    ?>
            </table>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var staffList = document.getElementById('user_list');
        staffList.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = 'list_of_staff.php';
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var staffList = document.getElementById('add_user');
        staffList.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = 'add_new_user.php';
            });
        });
    </script>
</body>

</html>