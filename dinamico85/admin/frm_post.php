
<div id="box-cadastro">
    <div id="formulario-menor">
        <form id="frm_post" name="frm_post" action="op_post.php" method="POST">
            <fieldset>
                 <?php
                    require_once('../config.php');
                    $cats = categoria::getListCategoria();
                    ?>
                <legend>Cadastro de post</legend>
                <label>

                <span>categorias</span>
                        <select  name="categoria" id="categoria">
                            <?php 
                            foreach($cats as $cat){
                                ?>
                                <option value="<?php echo $cat['id_categoria'];?>"><?php echo $cat['categoria'];?></option>
                                    <?php
                                     }
                                    ?>
                        </select>

                    <span>titulo</span>
                    <input type="text" name="txt_post_titulo" id="txt_post_titulo" value="" required>

                    <span>descrição</span>
                    <input type="text" name="txt_post_descricao" id="txt_post_descricao" value="" required>

                    <span>imagem</span>
                    <input type="text" name="txt_post_img" id="txt_post_img" value="" required>

                    <span>visitas</span>
                    <input type="text" name="txt_post_visitas" id="txt_post_visitas" value="" required>

                    <span>data</span>
                    <input type="date" name="txt_post_data" id="txt_post_data" value="" required>
                </label>
                  <div>
                    <p id="p_ativo">Ativo <input type="checkbox" name="check_ativo_post" id="check_ativo_post" checked> </p>
                  </div>
                  <br>
                  <input type="submit" value="Cadastrar" class="botao" name="btn_cadastrar">
                  <span><?php echo (isset($_GET['msg']))?"Sucesso":''; ?></span>
               
            </fieldset>
        </form>
    </div>
</div>

