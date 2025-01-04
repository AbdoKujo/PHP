<?php
    function add($var1,$var2){
        return $var1 + $var2;
    }
    function subtract($var1,$var2){
        return $var1 - $var2;
    }
    function multiply($var1,$var2){
        return $var1 * $var2;
    }
    function devise($var1,$var2){
        try{
            if ($var2 == 0){
                throw new Exception("Eureur : On peut pas devise par 0");
            }
            else   return $var1 / $var2;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
?>
<form method="POST">
    <label for="n1"></label>
    <input type="number" id="n1" name="n1" value="0">
    <label for="n2"></label>
    <input type="number" id="n2" name="n2" value="0">
    <select id="op" name="op">
        <option name="+" id="+">+</option>
        <option name="-" id="-">-</option>
        <option name="*" id="*">*</option>
        <option name="/" id="/">/</option>
    </select>
    <input type="submit" value="Resultat">

    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['n1']) && isset($_POST['n2']) && isset($_POST['op'])){
            $n1 = htmlspecialchars($_POST['n1']);
            $n2 = htmlspecialchars($_POST['n2']);
            $op = htmlspecialchars($_POST['op']);

            if($op=== '+') echo "<br>".add($n1,$n2);
            if($op=== '-') echo "<br>".subtract($n1,$n2);
            if($op=== '*') echo "<br>".multiply($n1,$n2);
            if($op=== '/') echo "<br>".devise($n1,$n2);
        }
    }    
    ?>
</form>