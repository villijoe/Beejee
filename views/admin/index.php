<?php

include_once(ROOT . "/views/layouts/nav.php");

?>

<form class="col-xs-3" method="post" action="admin/login" enctype="multipart/form-data">
    <div class="form-group">
        <label for="form-name">Имя пользователя</label>
        <input type="text" class="form-control" name="name" id="form-name" placeholder="User Name" required autofocus />
    </div>
    <div class="form-group">
        <label for="form-password">Password</label>
        <input type="password" class="form-control" name="password" id="form-password" placeholder="Password" required />
    </div>
    <input type="submit" class="btn btn-default" />
</form>
