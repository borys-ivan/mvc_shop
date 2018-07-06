<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/header.php'; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/admin_sidebar.php'; ?>


    <div id="wrapper">
        <section id="intro" class="wrapper style1 fullscreen fade-up">
            <div class="inner">
                <?
                $result=$this->getData();
                //print_r($result);
                if (isset($result)) {

                    echo "<table><tr><th>Користувач:</th>";
                    echo "<th>Скринька:</th>";
                    echo "<th>Імя:</th>";
                    echo "<th>Прізвище:</th>";
                    echo "<th>Телефон:</th></tr>";

                    foreach ($result['list_users'] as $user) {


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

                <? echo $result['pag']; ?>
            </div>
        </section>
    </div>


<? //php include ROOT . '/views/layouts/footer.php'; ?>