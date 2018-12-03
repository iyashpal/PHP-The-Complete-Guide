<div class="row">
    <div class="col-md-12">
        <h1>Add New Todo</h1>
        <form method="POST" action="">
            <input type="hidden" name="new-todo" value="zzz">
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" name="title" class="form-control" placeholder="i.e. Cleaning Home">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit Form</button>
        </form>
    </div>
</div>
