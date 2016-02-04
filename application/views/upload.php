<?php echo $error;?>


<form action="<?php echo base_url().'index.php/upload/do_upload'; ?>" method="POST" enctype="multipart/form-data">
    <legend>Form title</legend>

    <div class="form-group">
        <label for="">label</label>

<input type="file" name="userfile" size="20" />
    </div>

    

<input type="submit" value="upload" />
</form>
