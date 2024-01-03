<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Mon He Thong Nhung</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in">
            <form id="loginForm">
                <h1>Sign In</h1>
                <input type="username" placeholder="username" id="user">
                <input type="password" placeholder="password" id="pass">
                <button>Sign In</button>
            </form>
    </div>
    
</body>

</html>
<script>
    document.getElementById("loginForm").addEventListener("submit", 
    function(event){
        event.preventDefault(); // Ngăn chặn gửi dữ liệu form

        var username = document.getElementById("user").value;
        var password = document.getElementById("pass").value;

        if (username === "admin" && password === "admin"){
            window.location.href = "index.php";
        } else {
            alert("Wrong username or password");
        }
})
</script>