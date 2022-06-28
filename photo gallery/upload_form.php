<div class="row">
    <div class="col-md-6">
        <div>
        <p style="text-align:center; margin-top: 50px">File Uploader</p>
        <form method="POST" action="process_upload.php" 
            enctype="multipart/form-data">
        <!-- Name input -->
        <div class="form-outline mb-4">
            <input type="text" name="title" id="form4Example1" class="form-control" />
            <label class="form-label" for="form4Example1">Title</label>
        </div>

        <!-- Message input -->
        <div class="form-outline mb-4">
            <textarea class="form-control" name="description" id="form4Example3" rows="4"></textarea>
            <label class="form-label" for="form4Example3">Description</label>
        </div>

        <label class="form-label" for="customFile">
                Choose photo</label>
            <input type="file" name="photo" class="form-control" id="customFile" />

        <!-- Submit button -->
        <button type="submit" style="margin-top: 20px" 
            class="btn btn-primary mb-4">Add file</button>
        </form>
    </div>
    </div>
</div>

