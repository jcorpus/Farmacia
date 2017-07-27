<div class="box box-success">
    <div class="box-header">
        <div class="box-title"><i class="fa fa-list"></i> Lista de notas de salida</div>
        <div class="box-tools pull-right">
            <a href="?controller=nota_salida&action=nuevo" class="btn btn-box-tool"><i class="fa fa-plus"></i> Agregar</a>
        </div>
    </div>
    <div class="box-body no-padding">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Tipo Nota</th>
                    <th>Número</th>
                    <th>Método Entrega</th>
                    <th>Cantidad Productos</th>
                    <th>Fecha Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $row):?>
                    <tr>
                        <td><?=$row['tpnts_des']?></td>
                        <td><?=$row['nts_num']?></td>
                        <td><?=$row['nts_mten']?></td>
                        <td><?=$row['nts_cant']?></td>
                        <td><?=$row['nts_freg']?></td>
                        <td class="text-center">
                            <a  href="?controller=nota_salida&action=editar&id=<?=$row['nts_id']?>" title="Editar" data-toogle="tooltip" class="btn btn-link"><i class="fa fa-edit"></i></a>
                            <a  href="?controller=nota_salida&action=eliminar&id=<?=$row['nts_id']?>" title="Eliminar" data-toogle="tooltip" class="btn btn-link"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<?php
