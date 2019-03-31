<?php require_once 'partials/__header.php';?>
   <main role="main" class="login-page">
    <div class="container">
        <?php require_once 'partials/__notification.php'?>
        <form class="form-signin" action="/register" method="post" enctype="multipart/form-data">
            <h1 class="h3 mb-3 font-weight-normal">Create your account</h1>
            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" class="form-control" placeholder="Email address" required>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <label for="inputPhoto" class="sr-only">Profile Photo</label>
            <input type="file" name="profile_photo" class="form-control" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        </form>
    </div>
</main>

<?php require_once 'partials/__footer.php';?>
