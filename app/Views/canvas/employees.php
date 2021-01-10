<?php $this->extend('layouts/canvas-layout'); ?>
<?php $this->section('content') ?>
<div class="dashboard-canvas-document">
    <div class="dashboard-canvas-title">Employees</div>
    <div class="dashboard-canvas-content">
        <table>
            <tr><th>Name</th><th>Position</th><th>Team</th><th>Pay</th><th>Notes</th></tr>
            <?php foreach ($employees as $employee) :?>
                <tr>
                    <td><?=$employee->employee_name?></td>
                    <td><?=$employee->employee_position?></td>
                    <td><?=$employee->team_name?></td>
                    <td><?=$employee->pay_scale?><?=$employee->pay_scale_measure?></td>
                    <td><?=$employee->notes?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<style>
    table {
        width: 80%;
    }

    th {
        border-bottom: 1px solid black;
    }

    td {
        padding: 2vh 1vw;
        text-align: center;
    }
</style>
<?php $this->endSection(); ?>

