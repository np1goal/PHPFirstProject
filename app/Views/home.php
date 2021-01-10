<head><title>My Canvas</title></head>
<div id="home-document">
    <div id="home-text">
        <div id="my-canvas">My Canvas</div>
        <div id="tag-line">Keeps my work in check</div>
        <div id="login-button"><a id="login-home-button" href="/login">Login</a></div>
    </div>
</div>
<style>
    html {
        height: 100vh;
        width: 100vw;
        overflow: hidden;
        font-family: "Rounded Elegance";
        background-color: #2a2a72;
        background-image: url("assets/homeBG.png");
        background-size: cover;
    }

    #home-document {
        height: 100%;
        width: 100vw;
        display: grid;
        grid-template-columns: 55% auto;
        grid-template-areas:    '. home-text';
    }

    #home-text {
        grid-area: home-text;
        height: 100%;
        width: 100%;
        opacity: 0;
        transform: translateY(20px);
        color: white;
        display: grid;
        grid-template-rows: 40vh 10vh 10vh 2vh 5vh auto;
        grid-template-areas:    '.'
                                'my-canvas'
                                'tag-line'
                                '.'
                                'login-button'
                                '.';
        animation: home-text-entry 1s ease-in forwards;
    }

    @keyframes home-text-entry {
        100% { opacity: 1; transform: translateY(0px); }
    }

    #my-canvas {
        grid-area: my-canvas;
        font-size: 5vh;
        font-weight: bolder;
        display: flex;
        align-items: center;
    }

    #tag-line {
        grid-area: tag-line;
        font-size: 3vh;
        display: flex;
        align-items: center;
    }

    #login-button {
        grid-area: login-button;
        font-size: 2.5vh;
        display: flex;
        align-items: center;
    }

    #login-home-button {
        text-decoration: none;
        color: white;
        border-top: 1px solid white;
        border-bottom: 1px solid white;
        padding: 1vh 2vw;
        letter-spacing: 2px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    #login-home-button:hover {
        background-color: white;
        color: #23236d;
    }
</style>