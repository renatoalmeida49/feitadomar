<div id="modalSingup" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="h1">Cadastre-se</div>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= $base; ?>/singup">
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" id="name" class="form-control" required/>

                        <label for="login">Login:</label>
                        <input type="text" name="login" id="login" class="form-control" required/>

                        <label for="password">Senha:</label>
                        <input type="password" name="password" id="password" class="form-control" required />

                        <label for="repeatPassword">Repetir senha:</label>
                        <input type="password" name="repeatPassword" id="repeatPassword" class="form-control" required />
                    </div>

                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>