<div class="container">
    <div class="conteiner-login" id="formlogin">
        <?php
        $atributos = array('class' => 'form-horizontal', 'id' => 'formlogin');
        echo form_open(base_url().'home/login',  $atributos);
        ?>
            <div class="control-group">
                <a href="#" title="Stela Farias" class="logo fLeft"></a>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Usuário: </label>
                <div class="controls">
                    <input type="text" id="email" name="email" class="input-append" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword">Senha: </label>
                <div class="controls">
                    <input type="password" class="input-append" id="senha" name="senha" />
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn">Entrar</button>
                </div>
            </div>
        <?php
        echo form_close();
        ?>
    </div>
</div>
