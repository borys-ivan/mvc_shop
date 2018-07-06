<script src="/App/template/js/myscripts.js"></script>
<div id="block">



    <?if (!isset($_SESSION['user_ID'])) { ?>
            <h4>Користувач</h4>
            <center><p><input size='15' type='text' id='user_name'></p></center>
            <h4>Пароль</h4>
            <center><p><input type='password' id='pass'></p></center>
            <ul class='actions'>
                <center>
                    <li><input type='submit' id='submit' value="вхід"></li>
                </center>
            </ul>
            <center><a href='/cabinet/addUser'>Реєстрація</a></center>
    <?}if (isset($_SESSION['user_ID'])) { ?>
        <center>Користувач:<a href='/cabinet/view'><? print_r($_SESSION['user_name']) ?></a><br></center>
        <center><a href='/cabinet/logout'>вихід</a></center>

    <? } ?>
</div>


