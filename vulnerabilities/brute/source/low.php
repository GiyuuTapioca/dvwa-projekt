<?php

if (isset($_GET['Login'])) {
    $user = $_GET['username'];
    $pass = $_GET['password'];

    $query = "SELECT * FROM `users` WHERE user = ?";
    $stmt = mysqli_prepare($GLOBALS["___mysqli_ston"], $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['password'];

            if (password_verify($pass, $hashed_password)) {
                $avatar = htmlspecialchars($row["avatar"], ENT_QUOTES, 'UTF-8');
                $safe_user = htmlspecialchars($user, ENT_QUOTES, 'UTF-8');

                $html  = "<p>Welcome to the password protected area {$safe_user}</p>";
                $html .= "<img src=\"{$avatar}\" />";
            } else {
                $html = "<pre><br />Username and/or password incorrect.</pre>";
            }
        } else {
            $html = "<pre><br />Username and/or password incorrect.</pre>";
        }

        mysqli_stmt_close($stmt);
    } else {
        $html = "<pre>Database error: cannot prepare statement.</pre>";
    }

    ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
}
?>
