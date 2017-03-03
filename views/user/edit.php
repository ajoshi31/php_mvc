<H1> USERS EDIT</H1>


<div class="row">
    <form class="col s12" method="post" action="<?php echo URL;?>user/editSave/<?php echo $this->user[0]['userid']?>">
        <div class="row">
            <div class="input-field col s4">
                <input id="login" name="login" type="text" value="<?php echo $this->user[0]['login']?>">
                <label for="login">Login Name</label>
            </div>
            <div class="input-field col s4">
                <input id="password" type="text" name="password" class="validate">
                <label for="password">Password</label>
            </div>
            <div class="input-field col s4">
                <select name="role">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="default" <?php  if($this->user[0]['role'] == "default")  echo "selected"  ?>>Default</option>
                    <option value="owner" <?php if($this->user[0]['role'] == "owner") echo "selected" ?>>Owner</option>
                    <option value="admin" <?php if($this->user[0]['role'] == "admin") echo "selected" ?>>Admin</option>
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