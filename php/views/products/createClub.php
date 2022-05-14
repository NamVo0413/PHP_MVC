<h1>Create New Club</h1>
<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach($errors as $error): ?>
            <div>
                <?php echo $error.'<br>'; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<p>
    <a href="/clublist">Go Back To List</a>
</p>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>ClubID</label>
        <input type="text" name="ClubID" class="form-control" value="<?php echo $club['ClubID'] ?>">
    </div>
    <div class="mb-3">
        <label>ClubName</label>
        <input type="text" name="ClubName" class="form-control" value="<?php echo $club['ClubName'] ?>">
    </div>
    <div class="mb-3">
        <label>ShortName</label>
        <input type="text" name="Shortname" class="form-control" value="<?php echo $club['Shortname'] ?>">
    </div>
    <div class="mb-3">
        <label>StadiumID</label>
        <input type="text" name="StadiumID" class="form-control" value="<?php echo $club['StadiumID'] ?>">
    </div>
    <div class="mb-3">
        <label>CoachID</label>
        <input type="text" name="CoachID" class="form-control" value="<?php echo $club['CoachID'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

