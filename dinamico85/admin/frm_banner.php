<div id="box-cadastro">
    <div id="formulario-menor">
        <form id="frmbanner" name="frmbanner" action="op_banner.php" method="POST">
            <fieldset>
                <legend>Cadastro de Banner</legend>
                <label>

                    <span>titulo</span>
                    <input type="text" name="txt_banner_titulo" id="txt_banner_titulo" value="" required>

                    <span>link</span>
                    <input type="text" name="txt_banner_link" id="txt_banner_link" value="" required>

                    <span>imagem</span>
                    <input type="text" name="txt_banner_imagem" id="txt_banner_imagem" value="" required>

                    <span>alt</span>
                    <input type="text" name="txt_banner_alt" id="txt_banner_alt" value="" required>

                </label>
                  <div>
                    <p id="p_ativo">Ativo <input type="checkbox" name="check_ativo_banner" id="check_ativo_banner" checked> </p>
                  </div>
                  <br>
                  <input type="submit" value="Cadastrar" class="botao" name="btn_cadastrar">
                  <span><?php echo (isset($_GET['msg']))?"Sucesso":''; ?></span>
               
            </fieldset>
        </form>
    </div>
</div>