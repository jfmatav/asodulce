

<?php if ($meses) { ?>
<div class="records index large-9 medium-8 columns content">
    <h3><?= __('Registros Mensuales') ?></h3>
    <div class="table-responsive">
    <table class="table  table-striped">
        <thead>
            <tr>
                <th scope="col">Empleado</th>
                <th scope="col">Mes</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($meses as $mes): ?>
            <tr>
                <td><?= $mes['employee']->name . ' ' . $mes['employee']->lastname . ' ' . $mes['employee']->cedula ?></td>
                <td><?= $mes['mes'] ?></td>
                <td><?= $this->Number->format($mes['total'], [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <h4>Total de meses: <?= $this->Number->format($aguinaldo, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?></h4>
    <h4>Aguinaldo: <?= $this->Number->format($aguinaldo / 12, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?></h4>
                        <br>                        
            <button id="boton_imprimir" class="btn btn-default" onclick="imprimir()">Imprimir</button>
    <br><br><br>
</div>

<script>

function imprimir() {
    $("#boton_imprimir").hide();
    window.print();
    $("#boton_imprimir").show();
}

</script>

<?php } ?>