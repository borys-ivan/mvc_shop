<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/header.php'; ?>

    <link rel="stylesheet" type="text/css" href="/App/template/css/main_update.css">


<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/admin_sidebar.php'; ?>



    <div id="wrapper">
        <section id="intro" class="wrapper style1 fullscreen fade-up">

            <div class="inner">
                <a href="/admin/addProduct">Додати товар</a>
                <?
                $result=$this->getData();
                if (isset($result)) {

                    foreach ($result['list_products'] as $row) { ?>
                        <table>
                            <tr>
                                <th>
                                    <center><a href='/admin/updateProduct/<? echo $row['ID'] ?>'>Редагувати</a>
                                    </center>
                                </th>
                                <th>
                                    <center><a href='/admin/deleteProduct/<? echo $row['ID'] ?>'>Видалити</a>
                                    </center>
                                </th>
                                <th>
                                    <? if ($row['is_new']) { ?>
                                        <img id="image_new" src="/App/images/new.png">
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
                                    <image width='150' height='150' src="/App<? echo $row['image'] ?>"></image>
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

                <?echo $result['pag'];?>
            </div>
        </section>
    </div>


    <script src="/App/template/js/show_hide_test_list_admin.js"></script>

<? //php include ROOT . '/views/layouts/footer.php'; ?>