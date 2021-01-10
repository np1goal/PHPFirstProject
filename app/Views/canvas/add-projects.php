<?php $this->extend('layouts/canvas-layout'); ?>
<?php $this->section('content') ?>
<div class="dashboard-canvas-document">
    <div class="dashboard-canvas-title">Add Projects</div>
    <div class="dashboard-canvas-content">
        <form method="post" action="/dashboard/addProjects">
            <?php if(isset($validation)) : ?>
                <span class="error"><?php echo $validation->listErrors(); ?></span>
            <?php endif; ?>
            <div class="form-elements">
                <div><label>Project Title:</label></div>
                <div><input class="form-inputs" name="project_title" type="text" placeholder="Project #1"></div>
            </div>
            <div class="form-elements">
                <div><label>Project Owner</label></div>
                <div><input class="form-inputs" name="fullname" type="text" placeholder="Ex. Joe Smith"></div>
            </div>
            <div class="form-elements">
                <div><label>Project Description</label></div>
                <div><textarea class="form-inputs" rows="3" cols="80%" name="project_description" placeholder="This is the first project."></textarea></div>
            </div>
            <div class="form-elements" id="add-button-div">
                <input type="submit" value="Add Project" id="add-button">
            </div>
        </form>
    </div>
</div>
<style>
    form {
        width: 100%;
    }

    .form-elements {
        padding: 2vh 0vw;
        opacity: 0;
        transform: translateY(2vh);
        animation: form-elements-entry 0.5s ease forwards;
    }

    @keyframes form-elements-entry {
        100% { transform: translateY(0vh); opacity: 1; }
    }

    label {
        color: white;
    }

    .form-inputs {
        width: 80%;
        padding: 1vh;
        font-family: "Rounded Elegance";
        border-radius: 5px;
        border: 1px solid transparent;
    }

    input:focus {
        outline: none;
    }

    .error {
        color: #b10000;
    }

    #add-button-div {
        width: 100%;
    }

    a {
        color: white;
        text-decoration: none;
    }

    #add-button {
        padding: 1vh 2vw;
        border-radius: 2px;
        border: 1px solid transparent;
        background-color: white;
        color: black;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: "Rounded Elegance";
    }

    #add-button:hover {
        border: 1px solid white;
        background-color: transparent;
        color: white;
    }
</style>
<?php $this->endSection(); ?>
