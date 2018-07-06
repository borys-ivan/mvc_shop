<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/header.php'; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/admin_sidebar.php'; ?>


<div id="wrapper">
    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            <? $result = $this->getData();

            if (isset($result)) {

                foreach ($result['list_order'] as $order) {

                    ?>


                    <table>
                        <tr>
                            <th colspan='2'>
                                <center><a href='/admin/updateOrder/<? echo $order['ID']; ?>'>Редагувати</a>
                                </center>
                            </th>
                            <th colspan='3'>
                                <center><a href='/admin/deleteOrder/<? echo $order['ID']; ?>'>Відмінити</a></center>
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

            } else {
                echo "<h2>Список заказів пустий<h2>";
            }
            ?>
        </div>

        <? ;
        echo $result['pag']; ?>

    </section>


</div>

<script src="/App/template/js/show_hide_test_list_admin.js"></script>
