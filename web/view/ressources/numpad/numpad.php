<div id="numpad">
    <div class="full-width center smargbot">
        <input  id="numpad_input" name="numpad_input" type="<?= $numpad_type ?>" readonly="readonly"
                class="form-control center" pattern="<?= $numpad_pattern ?>" maxlength="<?= $numpad_maxlength ?>"
                <?php
                    if(isset($numpad_required)) {
                        if($numpad_required){
                            echo 'required="required"';
                        }
                    } 
                ?> >
        <button id="numpad_submit" class="btn btn-success" readonly="readonly">Valider</button>
    </div>
    <div class="container">
        <ul class="btn-group" data-toggle="buttons">
            <button id="numpad_one"    class="btn btn-primary center">1</button>
            <button id="numpad_two"    class="btn btn-primary center">2</button>
            <button id="numpad_three"  class="btn btn-primary center">3</button>
            <button id="numpad_four"   class="btn btn-primary center">4</button>
            <button id="numpad_five"   class="btn btn-primary center">5</button>
            <button id="numpad_six"    class="btn btn-primary center">6</button>
            <button id="numpad_seven"  class="btn btn-primary center">7</button>
            <button id="numpad_eight"  class="btn btn-primary center">8</button>
            <button id="numpad_nine"   class="btn btn-primary center">9</button>
            <button id="numpad_erease" class="btn btn-danger  center">Effacer</button>
            <button id="numpad_zero"   class="btn btn-primary center">0</button>
            <?php 
                if (isset($numpad_dot)) {
                    if ($numpad_dot) {
                        echo '<button id="numpad_dot" class="btn btn-primary center"><span>.<span></button>';
                    }
                }
            ?>
        </ul>
    </div>
</div>
<link rel="stylesheet" href="<?= "http://".$_SERVER['SERVER_NAME']."/zingage/web/view/ressources/numpad/numpad.css" ?>">
<script type="text/javascript" src="<?= "http://".$_SERVER['SERVER_NAME']."/zingage/web/view/ressources/numpad/numpad.js" ?>">
</script>