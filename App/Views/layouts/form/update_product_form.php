<?php include ROOT . '/views/layouts/header.php'; ?>

<div id="wrapper">
    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">



            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li class="warning_false"> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>




            <? foreach ($productID as $row) {

                //$_SESSION['ID_PRODUCT'] = $row['ID'];
                //echo $_SESSION['ID_PRODUCT'];
                ?>

                <form method="post" action="#">
                    <!--<h3>Редагування</h3>-->
                    <h4>Артикул</h4>
                    <center><input type="text" name="id_product" value="<? echo $row['ID_product']; ?>"/></center>
                    <h4>Товар</h4>
                    <center><p><input type="text" name="name" value="<? echo $row['name']; ?>"/></p></center>
                    <h4>Опис</h4>
                    <center><p><textarea type="text" rows="10" name="description"/><? echo $row['description']; ?>
                            </textarea></p>
                    </center>
                    <h4>Характеристика</h4>
                    <center><p><textarea type="text" rows="5"
                                         name="specifications"/><? echo $row['specifications']; ?></textarea></p></center>
                    <h4>Ціна</h4>
                    <center><p><input type="text" name="price" value="<? echo $row['price']; ?>"/></p></center>

                    <h4>Новинка</h4>
                    <select name="new">
                        <option value="<?echo $row['new']; ?>" selected="selected"><? echo $row['name_new']; ?></option>
                            <option value="1">Так</option>
                            <option value="0">Ні</option>
                    </select>

                    <h4>Наявність</h4>
                    <select name="status">
                        <option value="<?echo $row['status']; ?>" selected="selected"><? echo $row['name_status']; ?></option>
                        <option value="1">Опублікувати</option>
                        <option value="0">Приховати</option>
                    </select>

                    <h4>Кількість</h4>
                    <center><p><input type="text" name="count" value="<? echo $row['count']; ?>"/></p></center>


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

