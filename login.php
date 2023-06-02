<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .message.success {
            color: green;
            margin-top: 10px;
        }
        .message.error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    $message = '';

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Đọc dữ liệu từ tệp data.txt
        $file = fopen("data.txt", "r");
        $data = fread($file, filesize("data.txt"));
        fclose($file);

        // Kiểm tra tài khoản và mật khẩu
        $accounts = explode("\n", $data);
        foreach ($accounts as $account) {
            list($storedUsername, $storedPassword) = explode("|", $account);
            if ($username === trim($storedUsername) && $password === trim($storedPassword)) {
                $message = 'Đăng nhập thành công!';
                break;
            } else {
                $message = 'Tài khoản hoặc mật khẩu không đúng. Vui lòng thử lại.';
            }
        }
    }
    ?>

    <div class="container">
        <h1>Đăng nhập</h1>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Tài khoản" required><br>
            <input type="password" name="password" placeholder="Mật khẩu" required><br>
            <input type="submit" name="submit" value="Đăng nhập">
        </form>

        <?php
        if (!empty($message)) {
            if ($message === 'Đăng nhập thành công!') {
                echo '<p class="message success">' . $message . '</p>';
            } else {
                echo '<p class="message error">' . $message . '</p>';
            }
        }
        ?>
    </div>
</body>
</html>
