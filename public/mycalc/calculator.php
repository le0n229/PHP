
<form action="/math.php" method="post">

<input type="text" name="operand1" id="val1" value="<?=$_GET['oper1']?>">
<select name="operation">
    <option value="sum">+</option>
    <option value="sub">-</option>
    <option value="multy">*</option>
    <option value="div">/</option>
</select>
<!--<button class='action'> + </button>-->
<input type="text" name="operand2" id="val2" value="<?=$_GET['oper2']?>">
<button type="submit" class='action'> = </button>
<input type="text" id="val3" value="<?=$_GET['result']?>"><br>

<?php


