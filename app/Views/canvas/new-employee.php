<?php $this->extend('layouts/canvas-layout'); ?>
<?php $this->section('content') ?>
<div class="dashboard-canvas-document">
    <div class="dashboard-canvas-title">New Employee</div>
    <div class="dashboard-canvas-content">
        <form method="post" action="/dashboard/newEmployee">
            <?php if(isset($validation)) : ?>
                <span class="error"><?php echo $validation->listErrors(); ?></span>
            <?php endif; ?>
            <div class="form-elements">
                <div><label>Employee Name</label></div>
                <div><input class="form-inputs" name="employee_name" type="text" placeholder="Ex. Joe Smith"></div>
            </div>
            <div class="form-elements">
                <div><label>Employee Position</label></div>
                <div><input class="form-inputs" name="employee_position" type="text" placeholder="Ex. Accountant"></div>
            </div>
            <div class="form-elements">
                <div><label>Team</label></div>
                <div>
                    <input class="form-inputs" name="team_id" list="team-list" placeholder="Finance">
                    <datalist id="team-list">
                        <option value="Finance">
                        <option value="Sales">
                        <option value="Marketing">
                        <option value="Software">
                        <option value="Hardware">
                    </datalist>
                </div>
            </div>
            <div class="form-elements">
                <div><label>Pay Scale </label></div>
                <div>$
                    <input class="form-inputs" id="pay-scale-input" name="pay_scale" type="text" placeholder="20">
                    <input class="form-inputs" id="pay-scale-measure-input" name="pay_scale_measure" list="pay-scale-measure-list" placeholder="/hr">
                    <datalist id="pay-scale-measure-list">
                        <option value="/hr">
                        <option value="/yr">
                    </datalist>
                </div>
            </div>
            <div class="form-elements">
                <div><label>Notes</label></div>
                <div><input class="form-inputs" name="notes" type="text" placeholder="Any notes ..."></div>
            </div>
            <div class="form-elements" id="add-button-div">
                <input type="submit" value="Add" id="add-button">
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

    #pay-scale-input {
        width: 73.5%;
    }

    #pay-scale-measure-input {
        width: 5%;
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
