<?php $this->extend('layouts/canvas-layout'); ?>
<?php $this->section('content') ?>
<div class="dashboard-canvas-document">
    <div class="dashboard-canvas-title">Projects</div>
    <div class="dashboard-canvas-content">
        <div id="add-project"><a id="add-project-button" href="/dashboard/addProjects">Add Project&nbsp;&nbsp;<i class="fa fa-plus"></i></a></div>
        <div id="all-projects">
            <div id="project-content">
                <?php foreach ($projects as $project) : ?>
               <button class="project-title" id="project-title-1"><?= $project['project_title'] ?></button>
                <div class="project-content" id="project-content-1">
                    <div class="project-content-title"><span class="titles">Project Title: </span><span><?= $project['project_title'] ?></span></div>
                    <div class="project-content-owner"><span class="titles">Project Owner: </span><span><?= $project['owner_name'] ?></span></div>
                    <div class="project-content-description"><span class="titles">Project Description: </span><div><?= $project['project_description'] ?></div></div>
                    <div class="project-content-active-tasks"><span class="titles">Active Tasks: </span>
                        <div>
                            <ul>
                                <?php for($i = 0; $i < count($project['tasks']); $i++) : ?>
                                    <li><?= $project['tasks'][$i]->task_description ?></li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<style>
    #add-project-button {
        display: block;
        width: 95%;
        height: 5vh;
        margin-bottom: 3vh;
        color: black;
        background-color: white;
        text-decoration: none;
        border-radius: 2px;
        border: 1px solid transparent;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #all-projects {
        height: 100%;
        width: 95%;
    }

    #project-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .project-title {
        background-color: white;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
        border-bottom: 1px solid black;
    }

    .active, .project-title:hover {
        color: white;
        background-color: rgba(0, 144, 227, 0.1);
    }

    .project-title:after {
        content: '\002B';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: "\2212";
    }

    .project-content {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }

    .project-content-title, .project-content-owner, .project-content-description, .project-content-active-tasks {
        padding: 1vh;
        font-size: 1.9vh;
    }

    .titles {
        color: #0090e3;
        font-size: 2.1vh;
    }
</style>
<script>
    acc = document.getElementsByClassName("project-title");
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>
<?php $this->endSection(); ?>