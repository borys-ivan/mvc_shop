<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/views/layouts/header.php'; ?>

    <link rel="stylesheet" type="text/css" href="/App/template/css/main_update.css">
    <link rel="stylesheet" type="text/css" href="/App/template/slider/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/App/template/slider/slick/slick-theme.css">


<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/views/layouts/sidebar_busket.php'; ?>



    <div id="wrapper">


    <section id="intro" class="wrapper style1 fullscreen fade-up">


        <div class="inner">

            <div class="center slider">
                <?
                $result = $this->getData();
                if (isset($result['list_category'])) {
                    foreach ($result['list_category'] as $row) { ?>
                        <div>
                            <img src='/App<? echo $row['image'] ?>' alt='' width='300' height='250'>
                            <center><a href='/product/view/<? echo $row['ID'] ?>'><? echo $row['name'] ?></a><br>
                                <span id="price"><? echo $row['price'] ?>.грн</span>
                                <center>
                        </div>
                        <?
                    }
                }
                ?>
            </div>


            <?

            $result = $this->getData();
            foreach ($result['list_category'] as $row) { ?>
                <table>
                    <tr>
                        <td id='teb_test2'><img src='/App<? echo $row['image'] ?>' alt='' width='125' height='125'></td>
                        <td id='teb_test1'>
                            <a href='/product/view/<? echo $row['ID'] ?>'><? echo $row['name'] ?></a> <span
                                    id="price"><? echo $row['price'] ?>.грн</span>
                            <? if ($row['is_new']) { ?><img src="/App/images/new.png"><?
                            } ?> <br><? echo $row['specifications'] ?></td>
                    </tr>
                </table>
                <?
            }
            ?>


        </div>

        <? $test = $this->getData();
        echo $test['pag'];
        ?>

    </section>


    <script src="/App/template/js/list_product.js"></script>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/views/layouts/footer.php'; ?>