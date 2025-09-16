<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Candidato Entity
 *
 * @property int $id
 * @property string $nm_candidato
 * @property int $responsavel_id
 * @property int $escola_id
 * @property string $tipo_id
 * @property string $ano_id
 * @property int $ic_deletado
 * @property int $ic_ano_anterior
 * @property int $ic_recebido
 * @property int|null $ic_aprovado
 * @property string $vl_ctnumero
 * @property string|null $vl_ctlivro
 * @property string|null $vl_ctfolha
 * @property string $vl_certidao
 * @property \Cake\I18n\Date $dt_nascimento
 * @property string|null $vl_rg
 * @property string|null $vl_cpf
 * @property string|null $nm_filiacao1
 * @property string|null $nm_filiacao2
 * @property string|null $nm_rua
 * @property string|null $vl_numero
 * @property string|null $nm_bairro
 * @property string|null $nm_cidade
 * @property string|null $vl_cep
 * @property string|null $vl_tel
 * @property string|null $vl_tempo_res
 * @property string|null $vl_cel
 * @property int $ds_moradia
 * @property int $ds_dependentes
 * @property int $ds_rendafamiliar
 * @property int $ds_patrimonio
 * @property int|null $ds_transporte
 * @property string|null $ds_info_compl
 * @property string|null $ds_recebeobs
 * @property int $ic_deficiente
 * @property int $ic_recurso
 * @property string|null $ds_motivo_recurso
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Responsavel $responsavel
 * @property \App\Model\Entity\Escola $escola
 * @property \App\Model\Entity\Tipo $tipo
 * @property \App\Model\Entity\Ano $ano
 * @property \App\Model\Entity\Anexo[] $anexos
 * @property \App\Model\Entity\CandidatoClassifPontuacao[] $candidato_classif_pontuacaos
 * @property \App\Model\Entity\Inscrico[] $inscricoes
 * @property \App\Model\Entity\MovimentoCadastro[] $movimento_cadastros
 * @property \App\Model\Entity\SomaPontuacao[] $soma_pontuacao
 * @property \App\Model\Entity\SomaPontuacaosView[] $soma_pontuacaos_view
 * @property \App\Model\Entity\Modalidade[] $modalidades
 * @property \App\Model\Entity\Pontuacao[] $pontuacaos
 */
class Candidato extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'nm_candidato' => true,
        'responsavel_id' => true,
        'escola_id' => true,
        'tipo_id' => true,
        'ano_id' => true,
        'ic_deletado' => true,
        'ic_ano_anterior' => true,
        'ic_recebido' => true,
        'ic_aprovado' => true,
        'vl_ctnumero' => true,
        'vl_ctlivro' => true,
        'vl_ctfolha' => true,
        'vl_certidao' => true,
        'dt_nascimento' => true,
        'vl_rg' => true,
        'vl_cpf' => true,
        'nm_filiacao1' => true,
        'nm_filiacao2' => true,
        'nm_rua' => true,
        'vl_numero' => true,
        'nm_bairro' => true,
        'nm_cidade' => true,
        'vl_cep' => true,
        'vl_tel' => true,
        'vl_tempo_res' => true,
        'vl_cel' => true,
        'ds_moradia' => true,
        'ds_dependentes' => true,
        'ds_rendafamiliar' => true,
        'ds_patrimonio' => true,
        // 'ds_transporte' => true,
        'ds_info_compl' => true,
        'ds_recebeobs' => true,
        'ic_deficiente' => true,
        'ic_recurso' => true,
        'ds_motivo_recurso' => true,
        'created' => true,
        'modified' => true,
        'download' => true,
        'responsavel' => true,
        'escola' => true,
        'tipo' => true,
        'ano' => true,
        'anexos' => true,
        'candidato_classif_pontuacaos' => true,
        'inscricoes' => true,
        'movimento_cadastros' => true,
        'soma_pontuacao' => true,
        'soma_pontuacaos_view' => true,
        'modalidades' => true,
        'pontuacaos' => true,
    ];

    protected function _setVlCertidao()
    {
        // debug($this->vl_ctnumero);
        // die;

        $numero = preg_replace('/[\D]/', '', $this->vl_ctnumero);
        $livro = preg_replace('/[\D]/', '', $this->vl_ctlivro);
        $folha = preg_replace('/[\D]/', '', $this->vl_ctfolha);

        // debug($numero);
        // debug($livro);
        // debug($folha);
        // debug(str_pad($livro, 5, "0", STR_PAD_LEFT) .  str_pad($folha, 3, "0", STR_PAD_LEFT) . str_pad($numero, 7, "0", STR_PAD_LEFT));
        // die;
        
        $vl_certidao =  str_pad($livro, 5, "0", STR_PAD_LEFT) .  str_pad($folha, 3, "0", STR_PAD_LEFT) . str_pad($numero, 7, "0", STR_PAD_LEFT);

        // debug($vl_certidao);
        // die;

        return $vl_certidao;
    }
}
