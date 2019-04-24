<form action="/mycalc/math.php" method="post">

    <input type="text" name="operand1"  value="<?= $_GET['oper1'] ?>">
    <select name="operation">
        <option value="sum">+</option>
        <option value="sub">-</option>
        <option value="multy">*</option>
        <option value="div">/</option>
    </select>
    <input type="text" name="operand2"  value="<?= $_GET['oper2'] ?>">
    <button type="submit" > =</button>
    <input type="text" value="<?= $_GET['result'] ?>"><br>

</form>

<form action="/mycalc/math.php" method="post">
    <input data-operation="sum" type="text" name="operand1" class="operand1" value="<?= $_GET['oper1'] ?>">
    <button data-operation="sum" type="submit" class='action'> +</button>
    <input data-operation="sum" type="text" name="operand2" class="operand2" value="<?= $_GET['oper2'] ?>">
    <input hidden type="text" name="operation" id="val2" value="sum">
    <span>=</span>
    <input data-operation="sum" type="text" class="result" value="<?= $_GET['result'] ?>"><br>
</form>

<form action="/mycalc/math.php" method="post">
    <input type="text" name="operand1" id="val1" value="<?= $_GET['oper1'] ?>">
    <button type="submit" class='action'> -</button>
    <input type="text" name="operand2" id="val2" value="<?= $_GET['oper2'] ?>">
    <input hidden type="text" name="operation" id="val2" value="sub">
    <span>=</span>
    <input type="text" id="val3" value="<?= $_GET['result'] ?>"><br>
</form>

<form action="/mycalc/math.php" method="post">
    <input type="text" name="operand1" id="val1" value="<?= $_GET['oper1'] ?>">
    <button type="submit" class='action'> *</button>
    <input type="text" name="operand2" id="val2" value="<?= $_GET['oper2'] ?>">
    <input hidden type="text" name="operation" id="val2" value="multy">
    <span>=</span>
    <input type="text" id="val3" value="<?= $_GET['result'] ?>"><br>
</form>

<form action="/mycalc/math.php" method="post">
    <input type="text" name="operand1" id="val1" value="<?= $_GET['oper1'] ?>">
    <button type="submit" class='action'> /</button>
    <input type="text" name="operand2" id="val2" value="<?= $_GET['oper2'] ?>">
    <input hidden type="text" name="operation" id="val2" value="div">
    <span>=</span>
    <input type="text" id="val3" value="<?= $_GET['result'] ?>"><br>
</form>

