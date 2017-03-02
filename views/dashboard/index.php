<h1>DASHBOARD</h1>

<H4> Hello Buddy </H4>

<div class="row">
    <form id="randomInsert" class="col s12" action="<?php echo URL;?>dashboard/xhrInsert" method="post" >
        <div class="row">
            <label for="test">Enter Item To Insert</label>
            <input placeholder="Item Name" id="text" type="text" name="text">
        </div>
        <div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>


</div>


<div class="row">
    <ul class="collection with-header" id="listInserts">
        <li class="collection-header"><h4>List Items</h4></li>

    </ul>
</div>