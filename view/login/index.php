<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container">
        <div class="text-center form-container rounded-pill mt-5 p-5 w-50 m-auto">
                <h1>
                    Login
                </h1>
                <form class="" action="router.php?c=login&a=loja" method="POST">
                    <label for="input_email" id="lb_name">User Email: </label>
                    <input class="w-75" type="email" name="email" id="input_email" placeholder="example@email.com" required>
                    <br><br>
                    <label  for="input_password" id="lb_password">Password: </label>
                    <input class="w-75" type="password" name="password" id="input_password" required>
                    <br><br>
                    <input class="rounded-pill w-75" type="submit" value="Submit">
                </form>
        </div>
    </div>
</body>
</html>