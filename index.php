<!DOCTYPE html>
<html>
<head>
  <title>Users</title>
<link rel="stylesheet" type="text/css" href="css/Users.css">
<script>
  $(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>
</head>
<body>
<?php include'header.php'; ?> 
<main>
    <section>
    <!--User table-->
    <h1 class="slideInDown animated">Here are all the Users</h1>
    <body>
        <center>
            <p class="slideInDown animated">Click on the username to change the balance.</p>
        </center>
    </body>
    <div class="tbl-header slideInRight animated">
        <table cellpadding="0" cellspacing="0" border="0">
        <thead class="border-t border-slate-200 bg-slate-50 dark:border-slate-200/10 dark:bg-slate-800/75">
            <tr>
                <th scope="col" class="text-left relative w-12 px-6 sm:w-16 sm:px-8">
                    ID
                </th>
                <th scope="col" class="px-3 py-4 text-left text-sm font-semibold tracking-wide text-slate-900 whitespace-nowrap dark:text-slate-200">
                    Name
                </th>
                <th scope="col" class="px-3 py-4 text-left text-sm font-semibold tracking-wide text-slate-900 whitespace-nowrap dark:text-slate-200">
                    Finger ID
                </th>
                <th scope="col" class="px-3 py-4 text-left text-sm font-semibold tracking-wide text-slate-900 whitespace-nowrap dark:text-slate-200">
                    Gender
                </th>
                <th scope="col" class="px-3 py-4 text-center text-sm font-semibold tracking-wide text-slate-900 whitespace-nowrap dark:text-slate-200">
                    Phone Number
                </th>
                <th scope="col" class="pl-3 pr-4 py-4 text-left text-sm font-semibold tracking-wide text-slate-900 whitespace-nowrap sm:pr-6 dark:text-slate-200">
                    Email
                </th>
                <th scope="col" class="pl-3 pr-4 py-4 text-left text-sm font-semibold tracking-wide text-slate-900 whitespace-nowrap sm:pr-6 dark:text-slate-200">
                    Date
                </th>
                <th scope="col" class="pl-3 pr-4 py-4 text-left text-sm font-semibold tracking-wide text-slate-900 whitespace-nowrap sm:pr-6 dark:text-slate-200">
                    Balance
                </th>
            </tr>
        </thead>
        </table>
    </div>
  <div class="tbl-content slideInRight animated">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <?php
          //Connect to database
          require'connectDB.php';

            $sql = "SELECT * FROM users WHERE NOT username='' ORDER BY id ASC";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                echo '<p class="error">SQL Error</p>';
            }
            else{
              mysqli_stmt_execute($result);
                $resultl = mysqli_stmt_get_result($result);
              if (mysqli_num_rows($resultl) > 0){
                  while ($row = mysqli_fetch_assoc($resultl)){
          ?>
                    <tr class="relative hover:bg-slate-50">
                        <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                            <span>
                                <?php echo $row['id']; ?>
                            </span>
                        </td>
                        <td class="relative px-3 py-4 font-medium text-sm text-slate-900 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <a href="backup.php?id=<?php echo $row['id']; ?>" class="inline-flex items-center truncate hover:text-sky-600 dark:hover:text-sky-400">
                                        <span>
                                            <?php echo $row['username']; ?>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="relative px-3 py-4 text-sm text-slate-500 text-center whitespace-nowrap">
                            <span class="inline-flex items-center rounded-full font-medium bg-green-50 text-green-700 ring-1 ring-inset ring-green-600/20 dark:bg-green-500/10 dark:text-green-400 dark:ring-green-500/20 text-xs px-2 py-1">
                                <?php echo $row['fingerprint_id']; ?>
                            </span>
                        </td>
                        <td class="pl-3 pr-4 py-4 text-left text-sm text-slate-500 whitespace-nowrap sm:pr-6">
                            <span>
                                <?php echo $row['gender']; ?>
                            </span>
                        </td>
                        <td class="pl-3 pr-4 py-4 text-left text-sm text-slate-500 whitespace-nowrap sm:pr-6">
                            <span>
                                <?php echo $row['phonenumber']; ?>
                            </span>
                        </td>
                        <td class="pl-3 pr-4 py-4 text-left text-sm text-slate-500 whitespace-nowrap sm:pr-6">
                            <span>
                                <?php echo $row['email']; ?>
                            </span>
                        </td>
                        <td class="pl-3 pr-4 py-4 text-left text-sm text-slate-500 whitespace-nowrap sm:pr-6">
                            <span>
                                <?php echo $row['user_date']; ?>
                            </span>
                        </td>
                        <td class="pl-3 pr-4 py-4 text-left text-sm text-slate-500 whitespace-nowrap sm:pr-6">
                            <span>
                                <?php echo number_format($row['balance'] / 1, 0, ',', '.') . ' đ'; ?>
                            </span>
                        </td>
                    </tr>
        <?php
                }   
            }
          }
        ?>
      </tbody>
    </table>
  </div>
</section>
</main>
</body>
</html>