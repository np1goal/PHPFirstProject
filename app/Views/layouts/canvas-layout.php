<html>
<head>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?= $title; ?></title>
</head>
<div id="canvas-layout-body">
    <div id="canvas-navbar">
        <div id="logo">
            <a href="/"><img style="height: 50%;" src="/assets/logo.png"></a>
        </div>
        <div id="user-name"><span>Welcome, <?= session()->get('fullname'); ?></span></div>
        <div id="user">
            <i id="user-icon-link" class="user-icon far fa-user"></i>
            <div id="user-settings">
                <div class="user-icon-buttons"><a href="/dashboard/userSettings">User Settings</a></div>
                <div class="user-icon-buttons"><a href="/dashboard/logout">Log Out</a></div>
            </div>
        </div>
    </div>
    <div id="canvas-body">
        <div id="side-navbar">
            <div class="side-bar-div"><a class="side-bar-button" href="/dashboard">Dashboard</a></div>
            <div class="side-bar-div"><a class="side-bar-button" href="/dashboard/employees">My Employees</a></div>
        </div>
        <div class="dashboard"><?= $this->renderSection('content') ?></div>
    </div>
    <div id="canvas-footer">&copy; belongs to Nishtha Patel. January 2021.</div>
</div>
</html>
<style>
    html {
        overflow: hidden;
        height: 100vh;
        width: 100vw;
        font-family: "Rounded Elegance";
        background-color: #23236d;
        background-image: linear-gradient(315deg, #23236d 0%, #0090e3 74%);
    }

    a {
        text-decoration: none;
        color: black;
    }

    #canvas-layout-body {
        height: 100%;
        width: 100%;
        display: grid;
        grid-template-rows: 7vh auto 3vh;
        grid-template-areas:    'canvas-navbar'
                                'canvas-body'
                                'canvas-footer';
    }

    #canvas-navbar {
        grid-area: canvas-navbar;
        background-color: transparent;
        display: grid;
        grid-template-columns: 20vw auto 5vw;
        grid-template-areas:    'logo user-name user';
    }

    #logo {
        grid-area: logo;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    #user-name {
        grid-area: user-name;
        text-align: right;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        color: white;
    }

    #user {
        grid-area: user;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .user-icon {
        font-size: 3vh;
        color: white;
        cursor: pointer;
    }

    #user-settings {
        position: absolute;
        top: 6.5vh;
        right: 1vw;
        height: 100px;
        width: 200px;
        z-index: 100;
        display: none;
        background-color: rgba(255, 255, 255, 0.9);
    }

    .user-icon-buttons {
        width: 100%;
        text-align: center;
        padding: 2vh 0vw;
    }

    .user-icon-buttons:hover {
        background-color: rgba(0, 144, 227, 0.2);
    }

    #canvas-body {
        grid-area: canvas-body;
        overflow-y: auto;
        display: grid;
        grid-template-columns: 20vw auto;
        grid-template-areas:    'side-navbar dashboard';
    }

    #side-navbar {
        grid-area: side-navbar;
        padding: 2vh 0vw;
    }

    .side-bar-div {
        width: 100%;
        height: 5vh;
        padding: 1vh 0vw;
        text-align: center;
    }

    .side-bar-button {
        text-decoration: none;
        color: white;
    }

    .dashboard {
        grid-area: dashboard;
        overflow-y: scroll;
        height: 100%;
        background-color: rgba(255,255,255, 0.25);
    }

    .dashboard-canvas-document {
        width: 100%;
        height: 100%;
        display: grid;
        grid-template-rows: 7vh 2vh auto;
        grid-template-areas:    'to-do-list-title'
                                '.'
                                'dashboard-canvas-content';
    }

    .dashboard-canvas-title {
        grid-area: to-do-list-title;
        color: white;
        padding: 2vh 0vw 0vh 2vw;
        font-size: 4vh;
        border-bottom: 1px solid white;
    }

    .dashboard-canvas-content {
        grid-area: dashboard-canvas-content;
        width: 100%;
        height: 100%;
        padding: 2vh 2vw;
    }

    .error {
        color: #b10000;
    }

    .success {
        color: #0e810a;
    }

    #canvas-footer {
        grid-area: canvas-footer;
        color: white;
        display: flex;
        justify-content: center;
        padding-top: 1.5vh;
        font-size: 1.3vh;
    }
</style>
<script>
    document.getElementById('user').addEventListener('mouseover', function () {
        document.getElementById('user-settings').style.display = 'block';
    });

    document.getElementById('user-settings').addEventListener('mouseover', function () {
        document.getElementById('user-settings').style.display = 'block';
    });

    document.getElementById('user').addEventListener('mouseout', function () {
        document.getElementById('user-settings').style.display = 'none';
    })

    document.getElementById('user-settings').addEventListener('mouseout', function () {
        document.getElementById('user-settings').style.display = 'none';
    });
</script>