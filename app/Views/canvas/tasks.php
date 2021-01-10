<?php $this->extend('layouts/canvas-layout'); ?>
<?php $this->section('content') ?>
<div class="dashboard-canvas-document">
    <div class="dashboard-canvas-title">Tasks</div>
    <div class="dashboard-canvas-content">
        <div id="form-div">
            <form method="post" action="/dashboard/tasks">
                <input type="text" placeholder="Add Task" name="task_description">
                <input type="list" list="project-list" placeholder="Project" name="project_id">
                <datalist id="project-list">
                    <?php foreach ($projects as $project) :?>
                        <option><?= $project ?></option>
                    <?php endforeach; ?>
                </datalist>
                <input type="list" list="team-list" placeholder="Team" name="team_id">
                <datalist id="team-list">
                    <?php foreach ($teams as $team) :?>
                        <option><?= $team ?></option>
                    <?php endforeach; ?>
                </datalist>
                <input type="submit" value="Add Task" >
            </form>
            <?php if(isset($validation)) : ?>
                <span class="error"><?php echo $validation->listErrors(); ?></span>
            <?php endif; ?>
        </div>
        <table>
            <tr><th>Task</th><th>Project</th><th>Status</th></tr>
            <?php foreach ($tasks as $task) : ?>
                <tr><td><?= $task['task_description'] ?></td><td><?= $task['project_name'] ?></td><?php if($task['task_status'] == 'Active') :?><td style="color: #1b5f1b"><?= $task['task_status'] ?></td><?php else: ?><td style="color: #811010"><?= $task['task_status'] ?></td><?php endif; ?></tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<style>
    .dashboard-canvas-content {
        max-width: 90%;
        display: grid;
        grid-template-rows: 12vh auto;
        grid-template-areas:    'form-div'
                                'table';
    }

    #form-div {
        grid-area: form-div;
    }

    .error {
        color: #b10000;
    }

    form {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
    }

    input[type='text'], input[type='list'] {
        padding: 1vh;
        font-family: "Rounded Elegance";
        border-radius: 5px;
        border: 1px solid transparent;
    }

    input[type='text'] {
        width: 40vw;
    }

    input[type='list'] {
        width: 10vw;
    }

    input[type='submit'] {
        height: 4vh;
        padding: 0vh 1vw;
        font-family: "Rounded Elegance";
        border-radius: 5px;
        border: 1px solid transparent;
    }

    table {
        grid-area: table;
        width: 100%;
        margin-top: 3vh;
        padding: 1vh;
    }

    th {
        border-bottom: 1px solid black;
    }

    td, th {
        padding: 1vh 1vw;
        text-align: center;
    }
</style>
<?php $this->endSection(); ?>