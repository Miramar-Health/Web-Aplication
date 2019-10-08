<div id="box-cadastro">
    <div id="formulario-menor">
        <form id="frmbanner" name="frmbanner" action="op_banner.php" method="POST">
            <fieldset>
                <legend>Cadastro de Banner</legend>
                
                <br>
                <label>
                    <span>Titulo</span>
                    <input type="text" name="txt_banner_titulo" id="txt_banner_titulo" value="" required>
                </label>
                <br>
                <label>
                    <span>Link</span>
                    <input type="text" name="txt_banner_link" id="txt_banner_link" value="" required>
                </label>
                <br>
                <label>
                    <span>Imagem</span>
                    <input type="text" name="txt_banner_img" id="txt_banner_img" value="" required>
                </label>
                <br>
                <label>
                    <span>Alt</span>
                    <input type="text" name="txt_banner_alt" id="txt_banner_alt" value="" required>
                </label>
                <br>
                <div>
                    <p id="banner_ativo">Ativo <input type="checkbox" name="banner_check_ativo" id="banner_check_ativo" checked> </p>
                </div>
                <br>
                <input type="submit" value="Cadastrar" class="botao" name="btn_cadastrar">
                <span><?php echo (isset($_GET['MSG']))?"Sucesso":'';?></span> 
            </fieldset>
        </form>
    </div>
</div>