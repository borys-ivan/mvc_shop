<?php include ROOT . '/views/layouts/header.php'; ?>

<div id="wrapper">
    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">

            <?// foreach ($productID as $row) {

            //$_SESSION['ID_PRODUCT'] = $row['ID'];
            //echo $_SESSION['ID_PRODUCT'];
            ?>



            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li class="warning_false"> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>




            <form method="post" enctype="multipart/form-data" action="#">

                <h4>Категорія</h4>



                    <p><select name="category">
                            <option>Вибрати категорію</option>
                            <? foreach ($categories as $row){ ?>
                            <option value="<?echo $row['id_cat']?>"><?echo $row['name_cat']?></option>
                            <? } ?>
                        </select></p>



                <h4>Артикул</h4>

                <center><input type="text" name="id_product" /></center>

                <h4>Товар</h4>

                <center><p><input type="text" name="name"/></p></center>

                <h4>Головне зображення</h4>

                <input type="file" name="image" multiple accept="image/*,image/jpeg">

                <h4>Опис</h4>

                <center><p><textarea type="text" rows="10" name="description"/></textarea></p>
                </center>

                <h4>Характеристика</h4>

                <center><p><textarea type="text" rows="5"
                                     name="specifications"/></textarea></p></center>
                <h4>Ціна</h4>

                <center><p><input type="text" name="price"/></p></center>

                <h4>Новинка</h4>
                <select name="new">
                    <!--   <option selected="selected">Вибрати</option>-->
                       <option value="1">Так</option>
                       <option value="0">Ні</option>
                   </select>

                   <h4>Наявність</h4>
                   <select name="status">
                       <!--   <option selected="selected">Вибрати</option>-->
                       <option value="1">Опублікувати</option>
                       <option value="0">Приховати</option>
                   </select>

                   <h4>Кількість</h4>
                   <center><p><input type="text" name="count"/></p></center>

                   <ul class="actions">
                       <center>
                           <li><input type="submit" name="submit" value="Додати в базу товарів"></li>
                       </center>
                   </ul>
               </form>

            <!--  ////////////////-->
           <!-- <form enctype="multipart/form-data"  action="#" method="post">
                <p>Загрузите ваши фотографии на сервер</p>
                <p><input type="file" name="photo" multiple accept="image/*,image/jpeg">
                    <input type="submit" value="Отправить"></p>
            </form>-->
            <!--  /////////////////// -->
            <?//admin/add_image } ?>

        </div>
    </section>
</div>

