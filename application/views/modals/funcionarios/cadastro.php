<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalCadastro" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="formFuncionario" class="modal-content">
            <div class="modal-header">
                <h5 id="modalCadastro" class="font-weight-bold">Funcionário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-header font-weight-bold">Dados pessoais</div>
            <div class="modal-body">
                <input type="hidden" name="id">
                <div class="form-group">
                    <label class="font-weight-bold">Nome</label>
                    <input type="text" name="nome" class="form-control form-control-sm" placeholder="Nome completo do funcionário" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">CPF</label>
                            <input type="text" name="cpf" class="form-control form-control-sm" placeholder="000.000.000-00" data-mask="000.000.000-00" data-mask-reverse="true" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">RG</label>
                            <input type="text" name="rg" class="form-control form-control-sm" placeholder="RG do funcionário com dígito" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Sexo</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="masculino" name="sexo" value="0" checked>
                        <label class="custom-control-label" for="masculino">Masculino</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="feminino" name="sexo" value="1">
                        <label class="custom-control-label" for="feminino">Feminino</label>
                    </div>
                </div>
            </div>
            <div class="modal-header font-weight-bold">Contatos</div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="font-weight-bold">E-mail</label>
                    <input type="email" name="email" class="form-control form-control-sm" placeholder="E-mail do funcionário">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Celular</label>
                            <input type="text" name="celular" class="form-control form-control-sm" placeholder="(00)00000-0000" data-mask="(00)00000-0000" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Residência</label>
                            <input type="text" name="residencia" placeholder="(00)0000-0000" data-mask="(00)0000-0000" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-header font-weight-bold">Endereço</div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-bold">CEP</label>
                                <input type="text" name="cep" class="form-control form-control-sm" placeholder="00000-000" data-mask="00000-000" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="font-weight-bold">Logradouro</label>
                            <input type="text" name="logradouro" class="form-control form-control-sm" placeholder="Digite o logradouro" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Bairro</label>
                            <input type="text" name="bairro" class="form-control form-control-sm" placeholder="Bairro do logradouro" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Número</label>
                            <input type="text" name="numero" class="form-control form-control-sm" placeholder="Número da residência" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Complemento</label>
                            <input type="text" name="complemento" placeholder="S/C" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="font-weight-bold">Cidade</label>
                            <input type="text" name="cidade" class="form-control form-control-sm" placeholder="Cidade do endereço" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                         <div class="form-group">
                            <label class="font-weight-bold">Estado</label>
                            <input type="text" name="estado" class="form-control form-control-sm" placeholder="Estado do endereço" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-header font-weight-bold">Informações Admissionais</div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="font-weight-bold">Empresa</label>
                    <select name="empresa_id" class="form-control form-control-sm" required>
                        <option value="">Selecione Empresa</option>
                        <?php if(!empty($empresas)) : ?>
                            <?php foreach($empresas as $empresa) : ?>
                                <option value="<?=$empresa['id']?>"><?=$empresa['fantasia']?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Função</label>
                    <input type="text" name="funcao" class="form-control form-control-sm" name="Função do funcionário" required>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">Salário</label>
                            <input type="text" name="salario" class="form-control form-control-sm" data-mask="000.000,00" data-mask-reverse="TRUE" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">VR</label>
                            <input type="text" name="vr" class="form-control form-control-sm" data-mask="000,00" data-mask-reverse="TRUE" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-weight-bold">VT</label>
                            <input type="text" name="vt" class="form-control form-control-sm" data-mask="000,00" data-mask-reverse="TRUE" required>
                        </div>
                    </div>
                </div>
                <small>* Caso não tenha VT/VR, deixe valor 0.</small>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="font-weight-bold">Admissão</label>
                        <input type="date" name="admissao" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold">Demissão</label>
                        <input type="date" name="demissao" class="form-control form-control-sm">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm elegant-color" data-dismiss="modal">FECHAR</button>
                <button type="submit" class="btn btn-sm btn-success">SALVAR</button>
            </div>
        </form>
    </div>
</div>