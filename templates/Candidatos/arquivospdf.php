<div class="container mb-4">

    <?php foreach ($anexos as $anexo): ?>

        <div class="col-sm-12 col-lg-3 mb-2">
            <?= $anexo->nm_anexo ?>

        </div>
        <div class="col-sm-12 col-lg-3 mb-2">
            <?= $this->Html->link(
                $this->Html->image('/webroot/files/ano-2025' . '/Inscricoes/' . $anexo->inscricao_id . '/' . $anexo->cd_anexo_verificador . '&' . $anexo->nm_anexo),
                '../files/ano-2025' . '/Inscricoes/' . $anexo->inscricao_id . '/' . $anexo->cd_anexo_verificador . '&' . $anexo->nm_anexo,
                
            ); ?>
        </div>

    <?php endforeach; ?>

</div>