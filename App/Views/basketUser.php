<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/header.php'; ?>


<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="/App/template/js/basket_order.js"></script>




<?//php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/sidebar_busket.php'; ?>



<?php
    if($_SESSION['basket'])
        {
          include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/form/form_order_list.php';

        }else{

            include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/form/empty_order_list.php';
        }
?>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/footer.php'; ?>
