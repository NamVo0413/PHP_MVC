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
    <a href="/index">Go Back To List</a>
</p>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>PlayerID</label>
        <input type="text" name="PlayerID" class="form-control" value="<?php echo $product['PlayerID'] ?>"readonly>
    </div>
    <div class="mb-3">
        <label>FullName</label>
        <input type="text" name="FullName" class="form-control" value="<?php echo $product['FullName'] ?>"readonly>
    </div>
    <div class="mb-3">
        <label>ClubID</label>
        <input type="text" name="ClubID" class="form-control" value="<?php echo $product['ClubID'] ?>"readonly>
    </div>
    <div class="mb-3">
        <label>DOB</label>
        <input type="text" name="DOB" class="form-control" value="<?php echo $product['DOB'] ?>"readonly>
    </div>
    <div class="mb-3">
        <label>Position</label>
        <input type="text" name="Position" class="form-control" value="<?php echo $product['Position'] ?>"readonly>
    </div>
    <div class="mb-3">
        <label>Nationality</label>
        <input type="text" name="Nationality" class="form-control" value="<?php echo $product['Nationality'] ?>"readonly>
    </div>
    <div class="mb-3">
        <label>Number</label>
        <input type="text" name="Number" class="form-control" value="<?php echo $product['Number'] ?>" readonly>
    </div>
</form>