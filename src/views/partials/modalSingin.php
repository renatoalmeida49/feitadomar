<div id="modalSingin" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="h1">Login</div>
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= $base; ?>/login">
                    <div class="form-group">
                        <label for="login">Login:</label>
                        <input autofocus type="text" name="login" id="login" class="form-control" required/>

                        <label for="password">Senha:</label>
                        <input required id="password" class="form-control" type="password" size="32" name="password" />
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Entrar</button>
                    <a class="btn btn-secondary" data-dismiss="modal" href="#modalSingup" data-toggle="modal" data-target="#modalSingup">
                        Criar conta
                    </a>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>