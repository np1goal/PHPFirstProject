<?php $this->extend('layouts/canvas-layout'); ?>
<?php $this->section('content') ?>
<div class="dashboard-canvas-document">
    <div class="dashboard-canvas-title">To-Do List</div>
    <div class="dashboard-canvas-content">
        <form class="form-elements" method="post" action="/dashboard/addToDoList">
            <?php if(isset($validation)) : ?>
                <span class="error"><?php echo $validation->listErrors(); ?></span>
            <?php endif; ?>
            <div id="form-add-item">
                <input name="item" type="text" size="100%" placeholder="Add your list item">
                <input type="submit" value="Add">
            </div>
        </form>
        <table id="list-table">
            <?php foreach ($list_items as $item) : ?>
            <tr>
                <?php if($item->item_status == 1) :?>
                    <td data-tip="Finished item?"><a href="/dashboard/statusChangeToDoListItem/<?php echo $item->item_id ?>"><i class="fa fa-check" style="color: #00ff00"></i></a></td>
                    <td style="text-decoration: line-through;"><?= $item->item ?></td>
                <?php else :?>
                    <td><a href="/dashboard/statusChangeToDoListItem/<?php echo $item->item_id ?>"><i class="fa fa-check"></i></a></td>
                    <td style="text-decoration: none;"><?= $item->item ?></td>
                <?php endif; ?>
                <td data-tip="Delete item"><a href="/dashboard/deleteToDoListItem/<?php echo $item->item_id ?>"><i class="fa fa-close"></i></a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<style>
    .dashboard-canvas-content {
        overflow-x: hidden;
    }

    form, table {
        transform: translateY(20px);
        opacity: 0;
        animation: form-table-entry 0.5s ease forwards;
    }

    @keyframes form-table-entry {
        100% {
            opacity: 1;
            transform: translateY(0px);
        }
    }

    .form-elements {
        padding-bottom: 5vh;
    }

    #form-add-item {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    input {
        margin: 0vh 1vw;
        padding: 1vh 1vw;
        font-family: "Rounded Elegance";
        border-radius: 2px;
        border: 1px solid transparent;
    }

    input:focus {
        outline: transparent;
    }

    table {
        margin-right: 0;
        width: 95%;
    }

    td {
        padding: 2vh 1vw;
    }

    .close-anchor {
        color: black;
    }

    i {
        cursor: pointer;
    }

    a {
        text-decoration: none;
        color: black;
    }
</style>
<script>
    list = <?php $list_items; ?>;
    console.log(list);

    for(let i = 0; i < list.length; i++) {
        let row = document.createElement('tr');
        row.style.backgroundColor = 'white';

        let check_col = document.createElement('td');
        let tick = document.createElement('i');
        tick.className = 'fa fa-check';
        tick.style.textAlign = 'center';
        check_col.append(tick);

        let item = document.createElement('td');
        item.style.padding = '2vh 2vw';
        if(list[i][1] !== 'inactive') {
            tick.style.color = 'lightgreen';
            item.style.textDecoration = 'line-through';
        }
        item.textContent = list[i][0];

        let delete_col = document.createElement('td');
        let cross = document.createElement('i');
        cross.className = 'fa fa-close';
        cross.style.textAlign = 'right';
        cross.addEventListener("click", function () {
            list.splice(i,1);
            location.reload();
        });
        delete_col.append(cross);

        row.append(check_col);
        row.append(item);
        row.append(delete_col);

        document.getElementById('list-table').append(row);
    }
</script>
<?php $this->endSection(); ?>
