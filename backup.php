<!DOCTYPE html>
<html>
<head>
  <title>Users</title>
<link rel="stylesheet" type="text/css" href="css/update.css">
<script>
  $(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>
</head>
<body>
<?php include'header.php'; ?> 
<?php
// session_start();
include_once('connectDB.php');

// if (!isset($_SESSION['username_'])) {
//     header('location:index.php');
//     exit();
// }

if (isset($_GET['id'])) {
    $Id = $_GET['id'];

    $sql = "SELECT * FROM  `users`  WHERE id='$Id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    //$sqlProduct = "SELECT * FROM `product` WHERE `Product category ID` = '$Id'";
    //$queryProduct = mysqli_query($conn, $sqlProduct);


    if (isset($_POST['submit'])) {
        $tendanhmuc = mysqli_real_escape_string($conn, $_POST['balance']);

        $sql_update = "UPDATE  `users`  SET `balance` = `balance` + '$tendanhmuc' WHERE id='$Id'";
        $query_update = mysqli_query($conn, $sql_update);

        if ($query_update) {

            $sql = "SELECT * FROM  `users`  WHERE id='$Id'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($query);

            echo '<script>
        console.log("Tên danh mục đã được cập nhật thành công.");
        setTimeout(() => {
        const successBox = document.getElementById("successBox");
        successBox.innerHTML = "Account balance updated successfully!";
        successBox.style.top = "200px";
        successBox.style.right = "45px";
        successBox.style.backgroundColor = "rgba(255, 255, 255, 0.9)"; 
        successBox.classList.remove("hidden");

        setTimeout(function() {
        successBox.classList.add("hidden");
        }, 3000);
        }, 100);
        
        </script>';
        } else {
            echo "Sửa danh mục không thành công!";
        }
    }
}
?>

<main class="py-10 dark:bg-slate-900 dark:ring-white/10 dark:shadow-inner">
    <div class="px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="min-w-0 flex flex-1 items-center space-x-2">
            <a href="index.php" class="btn btn-default btn-xs">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z" clip-rule="evenodd"></path>
                </svg> </a>
        </div>
    </div>


    <div class="p-4 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-8 gap-6">
            <div class="col-span-3 xl:col-span-2 space-y-6">

                <form method="post" action="">
                    <div class="bg-white shadow-sm ring-1 ring-slate-200 rounded-md sm:rounded-lg dark:bg-slate-900 dark:ring-white/10 dark:shadow-inner dark:shadow-xl relative overflow-hidden">
                        <div class="px-4 py-5 sm:px-6">
                            <fieldset class="grid grid-cols-1 gap-6">
                                <div>
                                    <label class="block font-medium text-sm text-slate-700 dark:text-slate-200" for="name">
                                        ID: <?php echo $row['id'] ?>                               
                                    </label>
                                    <label class="block font-medium text-sm text-slate-700 dark:text-slate-200" for="name">
                                        Name: <?php echo $row['username'] ?>         
                                    </label>
                                    <label class="block font-medium text-sm text-slate-700 dark:text-slate-200" for="name">
                                        Current balance: <?php echo $row['balance'] ?>
                                    </label>
                                    <input class="appearance-none border border-slate-300 rounded-md shadow-sm checked:bg-sky-500 checked:text-sky-500 disabled:bg-slate-100 disabled:opacity-50 disabled:cursor-not-allowed focus:border-sky-500 focus:ring-sky-500 mt-1 block w-full sm:text-sm" type="text" name="balance" id="name" placeholder="Enter an amount...">

                                </div>


                            </fieldset>
                        </div>
                        <div class="px-4 py-3 rounded-b-md sm:px-6 sm:rounded-b-lg bg-slate-50 dark:bg-slate-800/75">
                            <div class="flex items-center justify-end">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<div id="successBox" class="hidden fixed z-50 top-0 right-2 m-4 p-4 bg-green-500 dark:text-white bg-gray-50/10 border border-gray-200 rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700 rounded shadow">
    ...
</div>