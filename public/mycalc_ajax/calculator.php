
    <input  data-operation="select" type="text" name="operand1" class="operand1" value="<?= $_GET['oper1'] ?>">
    <select id="selectOperation" name="operation">
        <option value="sum">+</option>
        <option value="sub">-</option>
        <option value="multy">*</option>
        <option value="div">/</option>
    </select>
    <input data-operation="select" type="text" name="operand2" class="operand2" value="<?= $_GET['oper2'] ?>">
    <button data-operation="select" class='action' > =</button>
    <input data-operation="select" type="text" class="result" value="<?= $_GET['result'] ?>"><br>



<br>
    <input data-operation="sum" type="text" name="operand1" class="operand1" value="<?= $_GET['oper1'] ?>">
    <button data-operation="sum" class='action'> + </button>
    <input data-operation="sum" type="text" name="operand2" class="operand2" value="<?= $_GET['oper2'] ?>">
    <span>=</span>
    <input data-operation="sum" type="text" class="result" value="<?= $_GET['result'] ?>"><br>

<br>
<input data-operation="sub" type="text" name="operand1" class="operand1" value="<?= $_GET['oper1'] ?>">
<button data-operation="sub"  class='action'> - </button>
<input data-operation="sub" type="text" name="operand2" class="operand2" value="<?= $_GET['oper2'] ?>">
<span>=</span>
<input data-operation="sub" type="text" class="result" value="<?= $_GET['result'] ?>"><br>

<br>
<input data-operation="multy" type="text" name="operand1" class="operand1" value="<?= $_GET['oper1'] ?>">
<button data-operation="multy"  class='action'> * </button>
<input data-operation="multy" type="text" name="operand2" class="operand2" value="<?= $_GET['oper2'] ?>">
<span>=</span>
<input data-operation="multy" type="text" class="result" value="<?= $_GET['result'] ?>"><br>

<br>
<input data-operation="div" type="text" name="operand1" class="operand1" value="<?= $_GET['oper1'] ?>">
<button data-operation="div"  class='action'> / </button>
<input data-operation="div" type="text" name="operand2" class="operand2" value="<?= $_GET['oper2'] ?>">
<span>=</span>
<input data-operation="div" type="text" class="result" value="<?= $_GET['result'] ?>"><br>


<script>
    const buttons = document.getElementsByClassName('action');
    const operand1 = document.getElementsByClassName('operand1');
    const arrOperand1 = Array.prototype.slice.call(operand1);
    const operand2 = document.getElementsByClassName('operand2');
    const arrOperand2 = Array.prototype.slice.call(operand2);
    const result = document.getElementsByClassName('result');
    const arrResult = Array.prototype.slice.call(result);

    for (let i = 0; i < buttons.length; i+=1) {
        buttons[i].addEventListener('click', async (e) => {
            e.preventDefault();
            let operation = e.target.dataset.operation;
            const currentOperand1 = arrOperand1.filter( el => el.dataset.operation === operation);
            const currentOperand2 = arrOperand2.filter((el) => el.dataset.operation === operation);
            const currentResult = arrResult.filter((el) => el.dataset.operation === operation);
            if (operation==='select'){
                operation=document.querySelector('#selectOperation').value;
            }

            let response = await fetch('math.php', {
                method: 'POST',
                headers:
                    {
                        'Accept':
                            'application/json',
                        'Content-Type':
                            'application/json'
                    }
                ,
                body: JSON.stringify({
                    'operand1': currentOperand1[0].value,
                    'operand2': currentOperand2[0].value,
                    'operation': operation
                })
            });
            let text = await response.text();
            let obj=JSON.parse(text);
            currentResult[0].value=obj.result;
        })
    }
</script>


