<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/views/layouts/header.php'; ?>

<div id="wrapper">
    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">

            <?
            $result = $this->getData();

            foreach ($result['order'] as $row) {

                ?>

                <form method="post" action="#">
                    <!--<h3>Редагування</h3>-->
                    <h4>Товар</h4>
                    <!--<center><p><input type="text" name="name" value="<? echo $row['name']; ?>"/></p></center>-->
                    <center>
                        <select name="name">
                            <option selected="selected"><? echo $row['name']; ?></option>

                            <? //print_r($result['list_product']);
                            foreach ($result['list_product'] as $name) {
                                ?>
                                <option value="<? echo $name['name']; ?>"><? echo $name['name']; ?></option>
                            <? } ?>

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