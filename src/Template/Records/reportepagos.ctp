<div class="container">
</div>

<?php if ($records) { ?>
<div class="records index large-9 medium-8 columns content">
    <h3><?= __('Registros') ?></h3>
    <div class="table-responsive">
    <table class="table  table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Empleado</th>
                <th scope="col">Trabajo</th>
                <th scope="col">Costo por hora</th>
                <th scope="col">Horas</th>
                <th scope="col">Es Extra</th>
                <th scope="col">Fecha</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record): ?>
            <tr>
                <td><?= $this->Number->format($record->id) ?></td>
                <td><?= $record->has('employee') ? $record->employee->name . ' ' . $record->employee->lastname . ' ' .  $record->employee->cedula : '' ?></td>
                <td><?= $record->has('job') ? $record->job->nombre : '' ?></td>
                <td><?= $this->Number->format($record->precio) ?></td>
                <td><?= $this->Number->format($record->horas) ?></td>
                <td><?= $record->es_extra == true ? 'Sí' : 'No' ?></td>
                <td><?= h($record->fecha) ?></td>
                <td><?= $this->Number->format($record->total, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    
    <h3>Total de horas: <?= $total_horas ?></h3>
    
    <h3>Salario Bruto: <?= $this->Number->format($total_ordinarias, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?> 
                       </h3>
    <h2>Salario Neto
    <br>
    <?= $this->Number->format($total_ordinarias, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?>
                        
                         <?php if ($asegurado){
                             echo ' - ';
                             echo $this->Number->format($total_ordinarias * 0.09, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                            ]);
                            echo ' (9%) = ';
                            $totalSalario = $total_ordinarias - ( $total_ordinarias * 0.09 );
                            echo $this->Number->format($totalSalario, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                            ]);
                         }
                         else {
                             $totalSalario = $total_ordinarias;
                         }
                         ?>
                         
                         
                         </h2>
    <h2>Salario a Pagar
    <br>
    <?= $this->Number->format($totalSalario, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                        ]); ?>
                        +
                         <?= 
                             
                             $this->Number->format($total_extras, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                            ]);
                            
                         ?>
                         
                          <?php 
                            
                            echo ' = ';
                            $totalPagar = $totalSalario + $total_extras;
                            echo $this->Number->format($totalPagar, [
                            'places' => 2,
                            'before' => '₡',
                            'after' => ''
                            ]);
                         
                         ?>
                         
                         </h2>
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


