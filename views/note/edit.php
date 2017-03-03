<H1> NOTE EDIT</H1>


<div class="row">
    <form class="col s12" method="post" action="<?php echo URL;?>note/editSave/<?php echo $this->note[0]['noteid']?>">
        <div class="row">
            <div class="input-field col s4">
                <input id="title" name="title" type="text" value="<?php echo $this->note[0]['title']?>">
                <label for="login">Title</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <textarea id="textarea1" class="materialize-textarea" name="content">
                    <?php echo $this->note[0]['content']?>
                </textarea>
                <label for="textarea1">Content</label>
            </div>
        </div>

        <div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>

</div>