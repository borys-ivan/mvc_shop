<?php include ROOT . '/views/layouts/header.php'; ?>

    <link rel="stylesheet" type="text/css" href="/template/css/main_update.css">


<?//php include ROOT . '/views/layouts/admin_sidebar.php'; ?>



    <div id="wrapper">
        <section id="intro" class="wrapper style1 fullscreen fade-up">

            <div class="inner">
                <a href="/admin/add_product">Додати товар</a>
                <?
                if (isset($ListProduct)) {

                    foreach ($ListProduct as $row) { ?>
                        <table>
                            <tr>
                                <th>
                                    <center><a href='/admin/update_product/<? echo $row['ID'] ?>'>Редагувати</a>
                                    </center>
                                </th>
                                <th>
                                    <center><a href='/admin/delete_product/<? echo $row['ID'] ?>'>Видалити</a>
                                    </center>
                                </th>
                                <th>
                                    <? if ($row['new']) { ?>
                                        <img id="image_new" src="/images/new.png">
                                        <?
                                    } ?>
                                </th>
                            </tr>
                            <tr>
                                <th>Товар:</th>
                                <th>Ціна:</th>
                                <th>Артикул:</th>
                            </tr>


                            <tr>
                                <th><? echo $row['name'] ?> </th>
                                <th> <? echo $row['price'] ?>.грн</th>
                                <th> <? echo $row['ID_product'] ?> </th>
                            </tr>

                            <tr>
                                <th>Характеристика:</th>
                                <th></th>
                                <th></th>
                            </tr>

                            <tr>
                                <th id='tab_product' colspan='2'> <? echo $row['specifications'] ?></th>
                                <th>
                                    <image width='150' height='150' src="<? echo $row['image'] ?>"></image>
                                </th>
                            </tr>

                            <tr>
                                <th>Опис:</th>
                                <th></th>
                                <th></th>
                            </tr>


                            <tr>
                                <th id='tab_product' colspan='3'>

                                    <div id="text<? echo $row['ID'] ?>" style="display:none; text-align:justify;">

                                        <? echo $row['description'] ?> </div>
                                    <a href="javascript:look('text<? echo $row['ID'] ?>');"
                                       id="a-text<? echo $row['ID'] ?>">показать</a>

                                </th>
                            </tr>

                        </table>

                    <? }

                } else {
                    echo "<h2>Список продуктів пустий<h2>";
                }
                ?>

                <? echo $pagination_list_products->get(); ?>
            </div>
        </section>
    </div>


    <script src="/template/js/show_hide_test_list_admin.js"></script>

<? //php include ROOT . '/views/layouts/footer.php'; ?>