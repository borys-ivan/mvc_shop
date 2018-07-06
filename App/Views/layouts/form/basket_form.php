<script src="/App/template/js/basket.js"></script>


<div id="block2">
    <?
    if(!empty($_SESSION['basket'])) {

        echo("<br><br> Загальна кількість:" . ($_SESSION['total_items']) . ".шт<br>");
        echo("Cумма:" . $_SESSION['total_price'] . ".грн");
        echo "<br><a href='/basket/view'>Увійти в корзину</a><br>";
    }else{

        echo("<br><br> Загальна кількість:0.шт<br>");
        echo("Cумма:0.грн");
        echo "<br><a href='/basket/view'>Увійти в корзину</a><br>";
    }



   ?>
</div>