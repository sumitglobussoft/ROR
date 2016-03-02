<form method="get" role="form" class="font-segoe">
    <div class="letterNavigation">
        <button name="letter" id="A" value="A" href="">A</button>
        <button name="letter" id="B" value="B" href="">B</button>
        <button name="letter" id="C" value="C" href="">C</button>
        <button name="letter" id="D" value="D" href="">D</button>

    </div>


    @if(isset($Resultbusinessbyletter))


    <?php echo '<pre>'; print_r($Resultbusinessbyletter);?>

    @endif


</form>
