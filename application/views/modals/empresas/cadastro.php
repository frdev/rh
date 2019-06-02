<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalCadastro" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="formEmpresa" class="modal-content">
            <div class="modal-header">
                <h5 id="modalCadastro" class="font-weight-bold">Adicionar Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id">
                <div class="form-group">
                    <label class="font-weight-bold">Razão Social</label>
                    <input type="text" name="rsocial" class="form-control form-control-sm" placeholder="Digite a razão social">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Nome Fantasia</label>
                    <input type="text" name="fantasia" class="form-control form-control-sm" placeholder="Digite o nome fantasia da empresa">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">CNPJ</label>
                    <input type="text" name="cnpj" class="form-control form-control-sm" placeholder="00.000.000/0000-00" data-mask="00.000.000/0000-00" data-mask-reverse="true">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm elegant-color" data-dismiss="modal">FECHAR</button>
                <button type="submit" class="btn btn-sm btn-success">SALVAR</button>
            </div>
        </form>
    </div>
</div>