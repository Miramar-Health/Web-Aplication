<form action="#" method="get">
<fieldset>
        <?php 
        $cat = categoria::getList();

        ?>
        <select name="categoria" id="categoria">
            <?php
            foreach ($cats as $cat) {
            ?>
            
            <option value="<?php echo $cat['id_categoria'];?>"></option>
            <option value="2">lampadas</option>

        </select>
       <input type="submit" value="inserir" name="btn_inserir">
</fieldset>
</form>
 
