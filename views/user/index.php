<H1> USERS </H1>

<h5>Create New User</h5>

<div class="row">
    <form class="col s12" method="post" action="<?php echo URL;?>user/create">
        <div class="row">
            <div class="input-field col s4">
                <input id="login" name="login" type="text">
                <label for="login">Login Name</label>
            </div>
            <div class="input-field col s4">
                <input id="password" type="text" name="password" class="validate">
                <label for="password">Password</label>
            </div>
            <div class="input-field col s4">
                <select name="role">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="default">Default</option>
                    <option value="owner">Owner</option>
                    <option value="admin">Admin</option>
                </select>
                <label>Materialize Select</label>
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
<h5> Update The Users </h5>
<table>
    <thead>
    <tr>
        <th data-field="userid">Item Id</th>
        <th data-field="name">Item Name</th>
        <th data-field="price">Item Price</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($this->userList as $key => $value) {
        ?>
        <tr>
            <td><?php echo $value["userid"] ?></td>
            <td><?php echo $value["login"] ?></td>
            <td><?php echo $value["role"] ?></td>
            <td> <a href="<?php echo URL; ?>user/edit/<?php echo $value['userid']; ?>"><i class="material-icons">mode_edit</i></a>
                <a href="<?php echo URL; ?>user/delete/<?php echo $value['userid']; ?>"><i class="material-icons">delete</i></a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
