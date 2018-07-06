<?php include ROOT . '/views/layouts/header.php'; ?>

<?php include ROOT . '/views/layouts/admin_sidebar.php'; ?>


    <div id="wrapper">
        <section id="intro" class="wrapper style1 fullscreen fade-up">
            <div class="inner">
                <?
                if (isset($ListUsers)) {

                    echo "<table><tr><th>Користувач:</th>";
                    echo "<th>Скринька:</th>";
                    echo "<th>Імя:</th>";
                    echo "<th>Прізвище:</th>";
                    echo "<th>Телефон:</th></tr>";

                    foreach ($ListUsers as $user) {


                        echo "<tr><th>" . $user['user_name'] . "</th>";
                        echo "<th>" . $user['email'] . "</th>";
                        echo "<th>" . $user['name'] . "</th>";
                        echo "<th>" . $user['surname'] . "</th>";
                        echo "<th>" . $user['number'] . "</th></tr>";

                    }
                    echo "</table>";

                } else {
                    echo "<h2>Список користувачів пустий<h2>";
                }
                ?>

                <? echo $pagination_list_users->get(); ?>
            </div>
        </section>
    </div>


<? //php include ROOT . '/views/layouts/footer.php'; ?>