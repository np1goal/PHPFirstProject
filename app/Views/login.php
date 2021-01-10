<head><title><?= $title ?></title></head>
<div id="body">
    <div id="login-card">
        <div id="nav-buttons"><a href="/login">Login</a><a href="/signup">Sign Up</a></div>
        <form method="post" action="/login">
            <?php if(isset($validation)) : ?>
                <span class="error"><?php echo $validation->listErrors(); ?></span>
            <?php endif; ?>
            <?php if(session()->get('success')) : ?>
                <br><span class="success"><?= session()->get('success') ?></span>
            <?php endif; ?>
            <div class="form-elements">
                <div><label>Email</label></div>
                <div><input name="email" type="text"></div>
            </div>
            <div class="form-elements">
                <div><label>Password</label></div>
                <div><input name="password" type="password"></div>
            </div>
            <div class="form-elements" id="member-question">
                <a href="/signup">Not a member?</a>
            </div>
            <div class="form-elements" id="login-button-div">
                <input type="submit" value="Login" id="login-button">
            </div>
        </form>
    </div>
</div>
<style>
    html {
        overflow: hidden;
        background-color: #23236d;
        background-image: linear-gradient(315deg, #23236d 0%, #0090e3 74%);
    }

    #body {
        height: 100vh;
        width: 100vw;
        display: flex;
        justify-content: center;
        font-family: "Rounded Elegance";
    }

    #login-card {
        width: 30%;
        padding-top: 20vh;
    }

    #nav-buttons {
        padding: 1vh 0vw 1vh 0vw;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    #nav-buttons::after {
        content: '';
        width: 5%;
        height: 3px;
        border-radius: 2px;
        background: white;
        position: absolute;
        bottom: 75%;
        left: 60.5%;
        animation: nav-button-animation 0.5s ease forwards;
    }

    @keyframes nav-button-animation {
        100% { left: 35.5%; }
    }

    form {
        width: 100%;
    }

    .form-elements {
        padding: 3vh 0vw;
        opacity: 0;
        transform: translateX(-2vw);
        animation: form-elements-entry 1s ease forwards;
    }

    @keyframes form-elements-entry {
        100% { transform: translateX(0vw); opacity: 1; }
    }

    .error {
        color: #b10000;
    }

    .success {
        color: #147717;
    }

    label {
        color: white;
    }

    input[type='text'], input[type='password'] {
        width: 100%;
        padding: 1vh;
        font-family: "Rounded Elegance";
        border-radius: 5px;
        border: 1px solid transparent;
    }

    input:focus {
        outline: none;
    }

    #member-question, #login-button-div {
        width: 100%;
        text-align: center;
    }

    a {
        color: white;
        text-decoration: none;
    }

    #login-button {
        padding: 1vh 2vw;
        border-radius: 2px;
        border: 1px solid transparent;
        background-color: white;
        color: black;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: "Rounded Elegance";
    }

    #login-button:hover {
        border: 1px solid white;
        background-color: transparent;
        color: white;
    }
</style>