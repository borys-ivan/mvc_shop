<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/header.php'; ?>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <!--<script src="/template/js/myscripts.js"></script>-->
    <style>
        .warning_false {
            color: red;
            font-size: 12pt;

        }

    </style>

<? //php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/sidebar.php'; ?>
    <section id="sidebar">
        <div class="inner">


            <nav>

                <ul>
                    <li><a href="#one">Вхід</a></li>
                    <li><a href="#two">Реєстрація</a></li>

                </ul>

            </nav>
        </div>

    </section>


    <!-- Wrapper -->
    <div id="wrapper">

        <!-- One -->
        <section id="one" class="wrapper style2 spotlights">


            <div class="inner">
                <h2>Вхід</h2>

                <p>
                <li>Для того щоб оформити ваше замовлення необхідно увійти як користувач.</li>
                </p>

                <p>
                <li>Якщо ви не зараєстровані перейдіть по силці Реєстрація.</li>
                </p>

                <form method="post" action="/basket/loginBeforeOrder">

                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/form/user_post_value.php'; ?>

                </form>


            </div>

        </section>


        <!-- Two -->
        <section id="two" class="wrapper style2 spotlights">
            <div class="inner">
                <h2>Реєстрація</h2>


                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li class="warning_false"> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                   

                <?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/form/registr_user_form.php'; ?>

            </div>
        </section>

    </div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/footer.php'; ?>