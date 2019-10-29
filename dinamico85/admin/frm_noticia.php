
<div id="box-cadastro">
    <div id="formulario-menor">
        <form id="frmbanner" name="frmbanner" action="op_noticia.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                 <?php
                    require_once('../config.php');
                    $cats = categoria::getListCategoria();
                    ?>
                <legend>Cadastro de noticia</legend>
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
                    <input type="text" name="noticia_titulo" id="noticia_titulo" value="" required>

                    <span>imagem</span>
                    <input type="file" name="foto" id="foto" value="" required>

                    <span>visita</span>
                    <input type="text" name="noticia_visita" id="noticia_visita" value="" required>

                    <span>data</span>
                    <input type="date" name="noticia_data" id="noticia_data" value="" required>

                    <span>noticia</span>
                    <input type="text" name="noticia" id="noticia" value="" required>
                </label>
                  <div>
                    <p id="p_ativo">Ativo 
                    <input type="checkbox" name="ativo_noticia" id="check_ativo_noticia" checked> </p>
                  </div>
                  <br>
                  <input type="submit" value="Cadastrar" class="botao" name="btn_cadastrar">
                  <span><?php echo (isset($_GET['msg']))?"Sucesso":''; ?></span>
               
            </fieldset>
        </form>
    </div>
</div>

