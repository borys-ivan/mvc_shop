<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/header.php'; ?>


    <div id="wrapper">
        <section id="intro" class="wrapper style1 fullscreen fade-up">
            <div class="inner">
                <form method="post" action="/basket/loginBeforeOrder">
                <h4>Користувач</h4>
                <center><p><input size='15' type='text' name="user_name" ></p></center>
                <h4>Пароль</h4>
                <center><p><input type='text' name="pass" ></p></center>
                <ul class='actions'>
                    <center>
                        <li><input type='submit' name="submit" ></li>
                    </center>
                </ul>
                </form>
            </div>
        </section>
    </div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/footer.php'; ?>