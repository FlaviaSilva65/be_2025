<?= $this->Html->css([
    'bootstrap',

    'pdf',
], ['fullBase' => true]) ?>
<?= $this->fetch('css') ?>

<body>
    <div class="print">
        <div id="cabecalho" class="w-100">
            <p><span><strong>
                        <?= $this->Html->image('cabecalho_pg.jpg', ['fullBase' => true]) ?>
                    </strong></span></p>
        </div>
        <div class="header">
            <h4 class="mt-0">Bolsa de Estudos Parcial - Formulário de Inscrição</h4>
        </div>

        <div class="body ml-0">
            <div class="col-md-12">
                <h5 class="d-flex justify-content-center" style="font-weight: bold;">Dados do Candidato</h5>
                <table class="w-100 table-striped">
                    <thead>
                        <tr>
                            <th width="20%">Inscrição Nro:</th>
                            <th width="30%">Nome:</th>
                            <th width="25%">Data de Nascimento:</th>
                            <th width="25%">RG:</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $bolsa->inscricao_id; ?></td>
                            <td><?= $bolsa->candidato->nm_candidato; ?></td>
                            <td><?=
                                $bolsa->candidato->dt_nascimento;
                                ?>
                            </td>
                            <td><?= $bolsa->candidato->vl_rg; ?></td>

                        </tr>
                    </tbody>
                </table>
                <table class="w-100 table-striped">
                    <tr>
                        <th>Candidato Deficiente: <?= $bolsa->candidato->ic_deficiente ? 'SIM' : 'Não' ?></th>
                    </tr>
                </table>
                <table class="w-100 table-striped">
                    <thead>
                        <tr>
                            <th width="20%">CPF:</th>
                            <th width="20%">Certidão / Livro / Folha</th>
                            <th width="30%">Filiação 1:</th>
                            <th width="30%">Filiação 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $bolsa->candidato->vl_cpf; ?></td>
                            <td><?= $bolsa->candidato->vl_ctnumero . ' - ' . $bolsa->candidato->vl_ctlivro . ' - ' . $bolsa->candidato->vl_ctfolha; ?></td>
                            <td><?= $bolsa->candidato->nm_filiacao1; ?></td>
                            <td><?= $bolsa->candidato->nm_filiacao2; ?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-100 table-striped">
                    <thead>
                        <tr>
                            <th width="20%">Endereço:</th>
                            <th width="20%">Bairro:</th>
                            <th width="20%">Cidade:</th>
                            <th width="20%">CEP:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $bolsa->candidato->nm_rua . ', Nº' . $bolsa->candidato->vl_numero; ?></td>
                            <td><?= $bolsa->candidato->nm_bairro; ?></td>
                            <td><?= $bolsa->candidato->nm_cidade; ?></td>
                            <td><?= $bolsa->candidato->vl_cep; ?></td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th width="25%">Telefone:</th>
                            <th width="25%">Tel. Res. / Contato:</th>
                            <th width="40%">Tempo de Residência na Cidade:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $bolsa->candidato->vl_tel; ?></td>
                            <td><?= $bolsa->candidato->vl_cel; ?></td>
                            <td><?= $bolsa->candidato->vl_tempo_res; ?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-100 table-striped">
                    <thead>
                        <tr>
                            <th width="35%">1ª Opção Unidade:</th>
                            <th width="30%">Ensino:</th>
                            <th width="35%">Ano escolar:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $bolsa->candidato->escola->nm_escola; ?></td>
                            <td>
                                <?php if ($bolsa->candidato->tipo_id == 1) : ?>
                                    Ed. Infantil
                                <?php elseif ($bolsa->candidato->tipo_id == 2) : ?>
                                    Ed. Fundamental 1
                                <?php elseif ($bolsa->candidato->tipo_id == 3) : ?>
                                    Ed. Fundamental 2
                                <?php elseif ($bolsa->candidato->tipo_id == 4) : ?>
                                    Ens. Médio
                                <?php endif ?>
                            </td>
                            <td><?= $bolsa->candidato->ano->nm_ano; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <h5 class="d-flex justify-content-center" style="font-weight: bold;">Dados do Responsável</h5>
                <table class="w-100 table-striped">
                    <thead>
                        <tr>
                            <th>Nome:</th>
                            <th>RG:</th>
                            <th>CPF:</th>
                            <th>Data de Nascimento:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $bolsa->responsavel->nm_responsavel; ?></td>
                            <td><?= $bolsa->responsavel->vl_rg_resp; ?></td>
                            <td><?= $bolsa->responsavel->vl_cpf ?></td>
                            <td><?= $bolsa->responsavel->dt_nascimento; ?></td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>Título:</th>
                            <th>Zona eleitoral:</th>
                            <th>Seção eleitoral:</th>
                            <th>E-mail:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $bolsa->responsavel->vl_titulo; ?></td>
                            <td><?= $bolsa->responsavel->vl_zona; ?></td>
                            <td><?= $bolsa->responsavel->vl_secao; ?></td>
                            <td><?= $bolsa->responsavel->nm_email; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <h5>Candidato posssui benefício no Ano-Anterior: <?= (($bolsa->candidato->ic_ano_anterior == 0) ? 'Não' : 'Sim') ?></h5>
            </div>
            <div class="col-md-12">
                <h5 class="d-flex justify-content-center" style="font-weight: bold;">Questionário sócio-Econômico</h5>
                <table class="w-100 table-striped">
                    <thead>
                        <tr>
                            <th>Moradia:</th>
                            <th>Dep. Menores de 18 anos:</th>
                            <th>Renda familiar / Salário mínimo:</th>
                            <th>Patrimônio:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php if ($bolsa->candidato->ds_moradia == 5) : ?>
                                    Alugada
                                <?php elseif ($bolsa->candidato->ds_moradia == 4) : ?>
                                    Financiada
                                <?php elseif ($bolsa->candidato->ds_moradia == 3) : ?>
                                    Cedida
                                <?php elseif ($bolsa->candidato->ds_moradia == 2) : ?>
                                    Própria
                                <?php elseif ($bolsa->candidato->ds_moradia == 1) : ?>
                                    Área de Reg. Fundiária
                                <?php endif ?>
                            </td>

                            <td>
                                <?php if ($bolsa->candidato->ds_dependentes == 1) : ?>
                                    1
                                <?php elseif ($bolsa->candidato->ds_dependentes == 2) : ?>
                                    2
                                <?php elseif ($bolsa->candidato->ds_dependentes == 3) : ?>
                                    3
                                <?php elseif ($bolsa->candidato->ds_dependentes == 4) : ?>
                                    4
                                <?php elseif ($bolsa->candidato->ds_dependentes == 5) : ?>
                                    Mais de 4
                                <?php endif ?>
                            </td>

                            <td>
                                <?php if ($bolsa->candidato->ds_rendafamiliar == 5) : ?>
                                    Até 2 Salários Mínimos
                                <?php elseif ($bolsa->candidato->ds_rendafamiliar == 4) : ?>
                                    3 a 5
                                <?php elseif ($bolsa->candidato->ds_rendafamiliar == 3) : ?>
                                    6 a 10
                                <?php elseif ($bolsa->candidato->ds_rendafamiliar == 2) : ?>
                                    11 a 15
                                <?php elseif ($bolsa->candidato->ds_rendafamiliar == 1) : ?>
                                    mais de 16
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if ($bolsa->candidato->ds_patrimonio == 5) : ?>
                                    Até R$ 150.000,00
                                <?php elseif ($bolsa->candidato->ds_patrimonio == 4) : ?>
                                    R$ 151.000,00 A R$ 300.000,00
                                <?php elseif ($bolsa->candidato->ds_patrimonio == 3) : ?>
                                    R$ 301.000,00 A R$ 450.000,00
                                <?php elseif ($bolsa->candidato->ds_patrimonio == 2) : ?>
                                    Acima de R$ 451.000,00
                                <?php endif ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <h5 class="d-flex justify-content-center" style="font-weight: bold;">Composição Familiar </h5>
                <span> (Todos os Membros da Família, Incluindo Dependentes) </span>
                <table class="w-100 table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Parentesco</th>
                            <th>Profissão</th>
                            <th>Local de Trabalho</th>
                            <th>Renda</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($bolsa->responsavel->comp_familiares)) { ?>

                            <?php foreach ($bolsa->responsavel->comp_familiares as $familiar) : ?>
                                <tr>
                                    <td><?= $familiar->nm_comp_fam ?></td>
                                    <td><?= $familiar->nm_parentesco ?></td>
                                    <td><?= $familiar->nm_profis_comp_fam ?></td>
                                    <td><?= $familiar->nm_end_trab ?></td>
                                    <td>R$ <?= number_format($familiar->vl_renda, 2, ',', ' '); ?></td>
                                </tr>
                            <?php endforeach;
                        } else { ?>
                            <td colspan="5" style="height: 25px; font-style: italic;">Sem Dados Informados</td>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <h5 class="d-flex justify-content-center" style="font-weight: bold;">Total do Patrimônio Familiar R$ <?= number_format($patrimonio, 2, ',', ' '); ?></h5>
                <h5>Bens Móveis</h5>
                <table class="w-100 table-striped">
                    <?php if (!empty($bolsa->responsavel->bem_moveis)) { ?>
                        <tr>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Ano</th>
                            <th>Valor</th>
                        </tr>
                        <?php foreach ($bolsa->responsavel->bem_moveis as $bem_movel) : ?>
                            <tr>
                                <td><?= $bem_movel->nm_modelo ?></td>
                                <td><?= $bem_movel->nm_marca ?></td>
                                <td><?= $bem_movel->num_ano_veic ?></td>
                                <td>R$ <?= number_format($bem_movel->vl_veiculo, 2, ',', ' '); ?></td>
                            </tr>
                        <?php endforeach;
                    } elseif ($bolsa->responsavel->ic_bens_moveis == 0) { ?>
                        <td colspan="5" style="height: 25px; font-style: italic;">Responsável informou não ter Bens Móveis</td>
                    <?php } else { ?>
                        <td colspan="5" style="height: 25px; font-style: italic;">Sem Dados Informados</td>
                    <?php } ?>
                </table>
            </div>
            <div class="col-md-12">
                <h5>Bens Imóveis</h5>
                <table class="w-100 table-striped">

                    <?php if (!empty($bolsa->responsavel->bem_imoveis)) { ?>
                        <tr>
                            <th>Tipo</th>
                            <th>Endereço</th>
                            <th>Valor</th>
                        </tr>
                        <?php foreach ($bolsa->responsavel->bem_imoveis as $bem_imovel) : ?>
                            <tr>
                                <td><?= $bem_imovel->nm_tipo ?></td>
                                <td><?= $bem_imovel->nm_end_imovel ?></td>
                                <td>R$ <?= number_format($bem_imovel->vl_imovel, 2, ',', ' '); ?></td>
                            </tr>
                        <?php endforeach;
                    } elseif ($bolsa->responsavel->ic_bens_imoveis == 0) { ?>
                        <td colspan="5" style="height: 25px; font-style: italic;">Responsável informou não ter Bens Imóveis</td>
                    <?php } else { ?>
                        <td colspan="5" style="height: 25px; font-style: italic;">Sem Dados Informados</td>
                    <?php } ?>
                </table>
            </div>
            <div class="col-md-12 mt-5">
                <?php if ($bolsa->candidato->ds_info_compl != '') { ?>
                    <h5> Observações</h5>
                    <table class="w-100 table-striped">
                        <tbody>
                            <tr>
                                <td>
                                    <?= $bolsa->candidato->ds_info_compl; ?>
                                </td>

                            </tr>
                        </tbody>
                    </table>

                <?php } ?>
                <?php  echo ($this->request->getSession()->read('Auth.User'));
                if (isset($user) && $anexos->count() > 0) { ?>
                    <h5> Documentos Anexos</h5>
                    <table class="w-100 table-striped">
                        <tr>
                            <th>Documento</th>
                            <th>Tipo de Documento</th>
                            <th>Status</th>
                        </tr>
                        <?php foreach ($anexos as $anexo) : ?>
                            <tr>
                                <td>
                                    <?= $anexo->nm_anexo; ?>
                                </td>
                                <td>
                                    <?= $anexo->tp_anexo->nm_tp_anexo . ' - ' .  $anexo->tp_anexo->ct_tp_anexo; ?>
                                </td>
                                <td>
                                    <?= !is_null($anexo->ic_aprovado) && $anexo->ic_aprovado == 0 ?
                                        'Não Aprovado' : (!is_null($anexo->ic_aprovado) && $anexo->ic_aprovado == 1 ? 'Aprovado' : '') ?>
                                </td>
                            </tr>

                            <?php $this->Html->image('/files/ano-' . $evento->ano_evento . '/Inscricoes/' . $anexo->inscricao_id . '/' . $anexo->cd_anexo_verificador . '&' . $anexo->nm_anexo, [
                                'fullBase' => true
                            ]) ?>
                        <?php endforeach; ?>
                    </table>
                <?php } ?>



                <div class="col-12 mb-2" style="width: 96%; border: 1px #c40000 solid; background: #ffe6e6; font-size: large; text-align: center;">
                    ATENÇÃO: A entrega da documentação deverá ser realizada no período de
                    <?= (isset($dtInicio) ? $dtInicio->format('d/m/Y') : '') ?> à <?= (isset($dtFim) ? $dtFim->format('d/m/Y') : '') ?>
                    por meio de upload dos documentos.
                </div>
            </div>
        </div>

    </div>

</body>
