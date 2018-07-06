<?php include ROOT . '/views/layouts/header.php'; ?>

<div id="wrapper">
    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">

            <? foreach ($ListUpdateOrders as $row) {

                //$_SESSION['ID_PRODUCT'] = $row['ID'];
                //echo $_SESSION['ID_PRODUCT'];
                ?>

                <form method="post" action="#">
                    <!--<h3>Редагування</h3>-->
                    <h4>Товар</h4>
                    <!--<center><p><input type="text" name="name" value="<? echo $row['name']; ?>"/></p></center>-->
                    <center>
                        <select name="name">
                            <option selected="selected"><? echo $row['name']; ?></option>

                            <?foreach ($ListProduct as $name){?>
                            <option value="<? echo $name['ID']; ?>"><? echo $name['list_product']; ?></option>
                            <?}?>

                        </select>
                    </center>
                    <h4>Дата</h4>
                    <center><p><input type="text" name="date" value="<? echo $row['data']; ?>"/></p></center>
                    <h4>Кількість</h4>
                    <center><p><input type="text" name="count" value="<? echo $row['amount_product']; ?>"/></p></center>
                    <h4>Сумма</h4>
                    <center><p><input type="text" name="sum" value="<? echo $row['amount_price']; ?>"/></p></center>

                    <ul class="actions">
                        <center>
                            <li><input type="submit" name="submit"></li>
                        </center>
                    </ul>
                </form>
            <? } ?>

        </div>
    </section>
</div>