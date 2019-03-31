<?php require_once 'partials/__header.php' ?>
<div class="container">
    <div class="card">
        <div class="card-body">
        <?php require_once 'partials/__notification.php'?>
            <main style="margin-top:100px;">
                <form class="form-signin" action="/login" method="post">
                    <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
                </form>
            </main>
        </div>
    </div>
</div>
<?php require_once 'partials/__footer.php' ?>
