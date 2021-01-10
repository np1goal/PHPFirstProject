<?php $this->extend('layouts/canvas-layout'); ?>
<?php $this->section('content') ?>
<div id="dashboard-body">
    <?php $datas = [
        ['Projects', 'dashboard/projects', 'fas fa-laptop-code', '#9FE9CA'],
        ['Tasks', 'dashboard/tasks', 'fas fa-clipboard-list', '#D6D293'],
        ['New Employee', 'dashboard/newEmployee', 'fas fa-user-plus', '#9C98CD'],
        ['To Do List', 'dashboard/toDoList', 'fas fa-tasks', '#D49696']
    ]; ?>
    <?php foreach ($datas as $data) :?>
        <?= view_cell('\App\Libraries\Components::createCard', ['data' => $data]) ?>
    <?php endforeach; ?>
</div>
<style>
    #dashboard-body {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }
</style>
<?php $this->endSection(); ?>

