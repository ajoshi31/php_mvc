<H1> NOTE </H1>

<h5>Create New Note</h5>

<div class="row">
    <form class="col s12" method="post" action="<?php echo URL;?>note/create">
        <div class="row">
            <div class="input-field col s4">
                <input id="title" name="title" type="text">
                <label for="login">Title</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <textarea id="textarea1" class="materialize-textarea" name="content"></textarea>
                <label for="textarea1">Textarea</label>
            </div>
        </div>

        <div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>

</div>
<br>
<h5> Update The Note </h5>
<table>
    <thead>
    <tr>

        <th data-field="id">Id</th>
        <th data-field="title">title</th>
        <th data-field="content">Content</th>
        <th data-field="date">Date Added</th>
        <th data-field="date">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($this->noteList as $key => $value) {
        ?>
        <tr>
            <td><?php echo $value["noteid"] ?></td>
            <td><?php echo $value["title"] ?></td>
            <td><?php echo $value["content"] ?></td>
            <td><?php echo $value["date_added"] ?></td>

            <td>
                <a href="<?php echo URL; ?>note/edit/<?php echo $value['noteid']; ?>"><i class="material-icons">mode_edit</i></a>
                <a href="<?php echo URL; ?>note/delete/<?php echo $value['noteid']; ?>"><i class="material-icons">delete</i></a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
