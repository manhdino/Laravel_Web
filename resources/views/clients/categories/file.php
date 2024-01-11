<h1>Upload file</h1>

<form method="POST" action="<?php echo route('categories.getFile') ?>" enctype="multipart/form-data">
    <div>
        <input type="file" name="photo" />
    </div>
    <?php echo csrf_field() ?>
    <button type="submit">Upload</button>
</form>