<div class="hr_home bg-vermelho mt-4"></div>
<div class="col-12 bannerprincipal">
    <h1 class="text-center mt-0"> <?= $escola->nm_escola ?> </h1>
</div>
<div class="hr_home bg-vermelho"></div>
<div class="container my-5">
    <div class="col-lg-8 d-flex">
        <?php if (isset($infantils)) { ?>
            <table class="w-100" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th>
                            <h5 class="mt-0">Educação Infantil</h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($infantils as $infantil) : ?>
                            <td>
                                <?= $infantil->ano->nm_ano; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        <?php } ?>

    </div>
</div>
<div class="container my-5">
    <div class="col-lg-8 d-flex">
        <?php if (isset($fundamentais)) { ?>
            <table class="w-100" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th>
                            <h5 class="mt-0">Ensino Fundamental</h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($fundamentais as $fundamental) : ?>
                            <td>
                                <?= $fundamental->ano->nm_ano; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>

<div class="container my-5">
    <div class="col-lg-8 d-flex">
        <?php if (isset($medios)) { ?>
            <table class="w-100" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th>
                            <h5 class="mt-0">Ensino Fundamental</h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($medios as $medio) : ?>
                            <td>
                                <?= $medio->ano->nm_ano; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>

<div class="col-md-12 d-flex justify-content-center my-4">
    <button type="button" class="btn btn-warning px-4 me-5" onclick="history.back()">
        <i class="bi bi-arrow-return-left text-white"></i>
    </button>

    <?= $this->Html->link('<i class="bi bi-pencil-square"></i>', ['action' => 'edit', $escola->id], ['class' => 'btn btn-sm btn-primary text-white px-4', 'escape' => false]) ?>

</div>