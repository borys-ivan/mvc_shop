<?php include $_SERVER['DOCUMENT_ROOT'] . 'App/Views/layouts/header.php'; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . 'App/Views/cabinet/sidebar.php'; ?>

<div id="wrapper">
    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            
            <h1>Історія заказів</h1>


<?if($user_order) { ?>

    <?
    echo "
            <table>
                <tr>
                    <th>Артикул:</th>
                    ";
    echo "
                    <th>Продукт:</th>
                    ";
    echo "
                    <th>Дата заказу:</th>
                    ";
    echo "
                    <th>Кількість:</th>
                    ";


    foreach ($user_order as $row) {
        echo "
                <tr>
                    <th>" . $row['art'] . "</th>
                    ";
        echo "
                    <th>" . $row['prod'] . "</th>
                    ";
        echo "
                    <th>" . $row['data'] . "</th>
                    ";
        echo "
                    <th>" . $row['item'] . "</th>
                </tr>
                ";


        echo "
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Сумма:" . $row['sum'] . ".грн</th>
                </tr>";
    }
    echo " </table>";

}else{echo "<h2>Історія замовлень пуста</h2>";}?>

            <!--<ul class="actions">
                <li><a href="#one" class="button scrolly">Детальніше</a></li>
            </ul>-->
        </div>
    </section>
</div>

</body>
</html>
