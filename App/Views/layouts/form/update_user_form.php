<?php include ROOT . '/views/layouts/header.php'; ?>

<div id="wrapper">
    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">

            <?foreach ($users_inform as $row){?>

            <form method="post" action="#">
               <!-- <h4>Користувач</h4>
                <center><p><input type="text" name="user_name" value="<? echo $row['user']; ?>"></p></center>-->
                <h4>Пароль</h4>
                <center><p><input type="text" name="pass" value="<? echo $row['pass']; ?>"></p></center>
                <h4>Email</h4>
                <center><p><input type="text" name="email" value="<? echo $row['email']; ?>"></p></center>
                <h4>Телефон</h4>
                <center><p><input type="text" name="number" value="<? echo $row['number']; ?>"></p></center>
                <h4>Імя</h4>
                <center><p><input type="text" name="name" value="<? echo $row['name']; ?>"></p></center>
                <h4>Прізвище</h4>
                <center><p><input type="text" name="surname" value="<? echo $row['surname']; ?>"></p></center>
                <ul class="actions">
                    <center>
                        <li><input type="submit" name="submit"></li>
                    </center>
                </ul>
            </form>
            <center><a href="order_user.html" class="button scrolly">ОК</a></center>

            <?}?>

        </div>
    </section>
</div>