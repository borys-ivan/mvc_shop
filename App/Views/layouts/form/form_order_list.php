<div id="wrapper">

    <style>
        .warning_true {
            color: springgreen;
            font-size:12pt;

        }

        .warning_false {
            color: red;
            font-size:12pt;

        }
    </style>


    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            <h1>Корзина</h1>


            <!--<form method="post" id="formx" action="javascript:void(null);" onsubmit="call()">-->
            <div id="basket">


                <?
                //   if (count($list_order)) {

                $result=$this->getData();
                //print_r($result);
                foreach ($result as $row){
                //print_r($row);
                ?>
                <table id="table_<? echo $row['ID']; ?>">

                <!--<table id="table_<?// echo $row['ID']; ?>">-->
                    <tr>
                        <th>Артикул:<? echo $row['ID_product']; ?></th>
                        <th>Товар:<? echo $row['name']; ?></th>
                        <th>Кількість:<input id="count_<? echo $row['ID']; ?>" class="count"
                                             data-id='<? echo $row['ID']; ?>'
                                             onchange="conversionPrice(<? echo $row['ID']; ?>)" type='text' name="count"
                                             value='<? echo $row['qty'] ?>'></th>
                        <th>Ціна:<span id="price_<? echo $row['ID']; ?>" value='<? echo $row['price'] ?>'
                                       data-id='<? echo $row['ID']; ?>'><? echo $row['price'] ?></span>.грн
                        </th>
                    </tr>
                    <tr>

                        <th colspan='2'>
                            <center><a href='#' id="delete_order_<? echo $row['ID']; ?>"
                                       data-id='<? echo $row['ID']; ?>' class="delete_order">Видалити</a>
                            </center>
                        </th>
                        <th>
                            <center><span class="warning_<? echo $row['class_warning'] ?>"
                                          id="warning_<? echo $row['ID']; ?>"><? echo $row['warning']; ?></span>
                            </center>
                        </th>
                        <th>Сумма:<span
                                    id="item_sum_<? echo $row['ID']; ?>"><? echo $pp = $row['price'] * $row['qty'] ?></span>.грн
                        </th>
                    </tr>
        <!--        </table>
            </div>!-->

            <!--</form> -->
                </table>
                <?
                }
                ?>

            </div>

            <ul class='actions'>
                <center>
                    <?if($row['warning_p']==true){?>
                        <li><a href="/basket/ConfirmOrder">Оформити заказ</a></li>
                    <?}?>
                </center>
            </ul>
        </div>


</div>
</section>