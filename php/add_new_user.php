<?php
    include 'getdataesp32.php';
?>
<?php 
    require_once('connect.php');
    $query = "SELECT * from user_stm32";
    $result = mysqli_query($conn,$query);
    if (isset($_GET['name']) && isset($_GET['user_id']) && isset($_GET['date_in']) && isset($_GET['time_in']) && isset($_GET['stm32_id'])) {
        $name = $_GET['name'];
        $id = $_GET['user_id'];
        $date = $_GET['date_in'];
        $time = $_GET['time_in'];
        $user_id = $_GET['stm32_id'];

        // Kiểm tra các trường nhập liệu không để trống
        if (empty($name) || empty($user_id) || empty($date_in) || empty($time_in) || empty($stm32_id)) {
            echo "Please fill in all fields!";
            exit();
        }

        // Thực hiện câu lệnh SQL để thêm dữ liệu vào bảng staff
        $sql = "INSERT INTO staff (name, user_id, date_in, time_in, stm32_id) VALUES (?, ?, ?, ?, ?)";
        $result = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($result, $sql)) {
            echo "SQL_Error_Insert";
            exit();
        } else {
            mysqli_stmt_bind_param($result, "sssss", $name, $user_id, $date_in, $time_in, $stm32_id);
            mysqli_stmt_execute($result);
            echo "New user has been added!";
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style_dashboard.css">
    <title>Add new user</title>
</head>

<header>
    <div>
        <h1 id="title_stm32">STM32 - Fingerfrint & Card</h1>
    </div>
</header>

<body>
    <div class ="container_select">
        <button id="user_log">Users Log</button>
    </div>

    <div class ="container_select">
        <button id="user_list">Users</button>
    </div>

    <div class ="container_select">
        <button id="add_user">Manage Users</button>
    </div>

    <div class="container" id="container">
        <div class="form-container add_new_user">
            <form>
                <h1>Create New User</h1>
                <input type="text" placeholder="User ID " id="user_id">
                <input type="text" placeholder="Name" id="name">
                <input type="date" placeholder="Email" id="email">
                <input type="time" placeholder="Phone" id="phone">
                <input type="text" placeholder="<?php echo $stm32_id; ?>" readonly id="stm32_id">
                <button type="button" onlick="addNewUser()">Add new user</button>
            </form>
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
        var staffList = document.getElementById('user_log');
        staffList.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = 'dashboard.php';
            });
        });

        function addNewUser() {
            // Lấy giá trị từ các trường nhập liệu
            var name = document.getElementById("name").value;
            var user_id = document.getElementById("user_id").value;
            var date_in = document.getElementById("email").value;
            var time_in = document.getElementById("phone").value;
            //var stm32_id = document.getElementById("stm_id").value;

            // Gửi yêu cầu AJAX đến tệp add_new_user.php
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                // Xử lý phản hồi từ add_new_user.php (nếu cần)
                    console.log(this.responseText);
                }
            };
            if (name === "" || user_id === "" || date_in === "" || time_in === "" || stm32_id === "") {
                alert("Please fill in all fields!");
                return;
            }
            xhttp.open("GET", "add_new_user.php?name=" + name + "&user_id=" + user_id + "&date_in=" + date_in + "&time_in=" + time_in + "&stm32_id=" + stm32_id, true);
            xhttp.send();
        }
    </script>
</body>

</html>