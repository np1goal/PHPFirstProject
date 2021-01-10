<a href="/<?= $data[1] ?>">
    <div id="card" style="background-color: <?= $data[3] ?>">
        <div class="icon"><i class="card-icon <?= $data[2]?>"></i></div>
        <div class="card-name"><?= $data[0]?></div>
    </div>
</a>
<style>
    a {
        text-decoration: none;
        transition: all 0.2s ease;
    }

    a:hover {
        transform: scale(1.03);
    }

    #card {
        height: 200px;
        width: 300px;
        margin: 2vh 2vw;
        border-radius: 5px;
        color: black;
        cursor: pointer;
        opacity: 0;
        transform: translateY(20px);
        display: grid;
        grid-template-columns: 55% auto;
        grid-template-areas:    'icon card-name';
        -webkit-box-shadow: 0px 0px 10px 3px rgba(0,0,0,0.25);
        -moz-box-shadow: 0px 0px 10px 3px rgba(0,0,0,0.25);
        box-shadow: 0px 0px 10px 3px rgba(0,0,0,0.25);
        animation: card-entry 0.5s ease forwards;
    }

    @keyframes card-entry {
        100% {
            opacity: 1;
            transform: translateY(0px);
        }
    }

    .icon {
        grid-area: icon;
        padding-top: 70px;
        padding-left: 30px;
    }

    .card-icon {
        font-size: 12vh;
    }

    .card-name {
        grid-area: card-name;
        padding-top: 5vh;
        font-size: 3vh;
    }
</style>
