<?php $this->extend('layouts/canvas-layout'); ?>
<?php $this->section('content') ?>
<div class="dashboard-canvas-document">
    <div class="dashboard-canvas-title">User Settings</div>
    <div class="dashboard-canvas-content">
        <form method="post" action="/dashboard/userSettings">
            <?php if(isset($validation)) : ?>
                <span class="error"><?php echo $validation->listErrors(); ?></span>
            <?php endif; ?>
            <?php if(session()->get('success')) : ?>
                <span class="success"><?= session()->get('success'); ?></span>
            <?php endif; ?>
            <div class="form-elements">
                <div><label>Full name</label></div>
                <div><input class="form-inputs" name="fullname" type="text" disabled value="<?= session()->get('fullname') ?>"></div>
            </div>
            <div class="form-elements">
                <div><label>Email Address</label></div>
                <div><input class="form-inputs" name="email" type="text" disabled value="<?= session()->get('email') ?>"></div>
            </div>
            <div class="form-elements">
                <div><label>Enter your New Password</label></div>
                <div><input class="form-inputs" name="password" type="password" placeholder="New Password"></div>
            </div>
            <div class="form-elements">
                <div><label>Re-enter your New Password</label></div>
                <div><input class="form-inputs" name="password_confirm" type="password" placeholder="New Password"></div>
            </div>
            <div class="form-elements" id="submit-button-div">
                <input type="submit" value="Submit" id="submit-button">
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

    #submit-button-div {
        width: 100%;
    }

    a {
        color: white;
        text-decoration: none;
    }

    #submit-button {
        padding: 1vh 2vw;
        border-radius: 2px;
        border: 1px solid transparent;
        background-color: white;
        color: black;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: "Rounded Elegance";
    }

    #submit-button:hover {
        border: 1px solid white;
        background-color: transparent;
        color: white;
    }
</style>
<?php $this->endSection(); ?>
