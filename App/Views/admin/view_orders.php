<?php include ROOT . '/views/layouts/header.php'; ?>

<?php include ROOT . '/views/layouts/admin_sidebar.php'; ?>


    <div id="wrapper">
        <section id="intro" class="wrapper style1 fullscreen fade-up">
            <div class="inner">
                <?
                if(isset($ListOrders)) {

                    foreach ($ListOrders as $order) { ?>


                        <table>
                            <tr>
                                <th colspan='2'>
                                    <center><a href='admin/update_order/<? echo $order['ID']; ?>'>Редагувати</a>
                                    </center>
                                </th>
                                <th colspan='3'>
                                    <center><a href='admin/delete_order/<? echo $order['ID']; ?>'>Відмінити</a></center>
                                </th>
                            </tr>
                            <tr>
                                <th>Користувач:</th>
                                <?// echo $order['ID'] ?>
                                <th>Товар:</th>
                                <th>Дата:</th>
                                <th>Кількість:</th>
                                <th>Сумма:</th>
                            </tr>
                            </th>


                            <tr>
                                <th> <? echo $order['user_name'] ?></th>
                                <th> <? echo $order['name'] ?></th>
                                <th> <? echo $order['data'] ?></th>
                                <th> <? echo $order['amount_product'] ?></th>
                                <th> <? echo $order['amount_price'] ?></th>
                            </tr>

                            <tr>
                                <th colspan='4'>
                                    <div id="text<? echo $order['ID'] ?>" style="display:none; text-align:justify;">

                                        Пошта:<? echo $order['email'] ?>,Телефон:<? echo $order['number'] ?>

                                    </div>

                                    <a href="javascript:look('text<? echo $order['ID'] ?>');"
                                       id="a-text<? echo $order['ID'] ?>">показать</a>
                                </th>
                            </tr>

                        </table>
                        <?
                    }

                }else {echo "<h2>Список заказів пустий<h2>";}
                ?>
            </div>

            <? echo $pagination_list_orders->get(); ?>

        </section>


    </div>

    <script src="/template/js/show_hide_test_list_admin.js"></script>
<? //php include ROOT . '/views/layouts/footer.php'; ?>