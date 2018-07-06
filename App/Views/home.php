<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/header.php'; ?>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/sidebar.php'; ?>


    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Intro -->
        <section id="intro" class="wrapper style1 fullscreen fade-up">
            <div class="inner">
                <h1>Вас вітає інтернет магазин!</h1>

            </div>
        </section>


        <!-- One -->
        <section id="one" class="wrapper style2 spotlights">
            <section>

                <div class="content">
                    <div class="inner">
                        <h2>Каталог</h2>


                        <?
                        $result = $this->getData();
                        foreach ($result['home'] as $row) { ?>


                            <a id="a_category" href='/home/category/<? echo $row['category_ID']; ?>'><img width='235'
                                                                                                          height='235'
                                                                                                          src='/App<? echo $row['image']; ?>'><? //echo $row['name_cat'];?>
                            </a>


                        <? } ?>
                        <br>
                        <p>
                        <li>Все що ви купите в нашому магазині - це сертифіковані товари, на які є гарантія виробника.
                        </li>
                        </p>
                        <p>
                        <li>Ви не продадуть того, що вам не потрібно.</li>
                        </p>
                        <p>
                        <li>Ми не тільки доставляємо товар, але і надаємо сервіс і техобслуговування.
                            Ви ніколи не залишитеся без відповіді на свої питання.
                        </li>
                        </p>


                    </div>
                </div>
            </section>


            <!-- Three -->
            <section id="three" class="wrapper style1 fade-up">
                <div class="inner">
                    <h2>Контакти</h2><br><br><br><br>
                    <!--<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat
                        malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet
                        imperdiet est velit quis lorem.</p>-->
                    <div class="split style1">
                        <section>
                            <!--    <form method="post" action="site/SendingToMail">
                                    <div class="field half first">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name"/>
                                    </div>
                                    <div class="field half">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email"/>
                                    </div>
                                    <div class="field">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" rows="5"></textarea>
                                    </div>
                                    <ul class="actions">
                                        <li><input type="submit" name="submit" value="Send Message"></li>
                                    </ul>
                                </form>-->
                        </section>
                        <section>
                            <ul class="contact">
                                <li>
                                    <h3>Email</h3>
                                    <a href="#">borys.ivan@gmail.com</a>
                                </li>
                                <li>
                                    <h3>Phone</h3>
                                    <span>(093)61-377-64</span>
                                </li>
                                <li>
                                    <h3>Social</h3>
                                    <ul class="icons">
                                        <li><a href="https://www.facebook.com/ivan.borys.39" class="fa-facebook"><span
                                                        class="label">Facebook</span></a></li>
                                        <li><a href="https://github.com/borys-ivan/shop_teh.ua" class="fa-github"><span
                                                        class="label">GitHub</span></a></li>

                                    </ul>
                                </li>
                            </ul>
                        </section>
                    </div>
                </div>
            </section>

    </div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/footer.php'; ?>