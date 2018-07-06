<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/header.php'; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/cabinet/sidebar.php'; ?>

<div id="wrapper">
    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">

            <h1>Історія заказів</h1>


<?
$result=$this->getData();


if($result) { ?>

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


    foreach ($result['user_order'] as $row) {
        echo "
                <tr>
                    <th>" . $row['ID_product'] . "</th>
                    ";
        echo "
                    <th>" . $row['name'] . "</th>
                    ";
        echo "
                    <th>" . $row['data'] . "</th>
                    ";
        echo "
                    <th>" . $row['amount_product'] . "</th>
                </tr>
                ";


        echo "
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Сумма:" . $row['amount_price'] . ".грн</th>
                </tr>";
    }
    echo " </table>";

}else{echo "<h2>Історія замовлень пуста</h2>";}?>

          
        </div>
    </section>
</div>

</body>
</html>
