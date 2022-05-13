<h1>Product CRUD</h1>
<p>
    <a href="/products/create" class="btn btn-success">Create Product</a>
</p>
<form>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search Product" name="search" value="<?php echo $search ?>">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
</form>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">PlayerID</th>
        <th scope="col">PlayerName</th>
        <th scope="col">ClubID</th>
        <th scope="col">DOB</th>
        <th scope="col">Position</th>
        <th scope="col">Nationality</th>
        <th scope="col">Number</th>
        <th scope="col">action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($products as $i => $item): ?>
        <th scope="row"><?php echo $i +1 ?></th>
        <td><?php echo $item['PlayerID'] ?></td>
        <td><?php echo $item['FullName'] ?></td>
        <td><?php echo $item['ClubID'] ?></td>
        <td><?php echo $item['DOB'] ?></td>
        <td><?php echo $item['Position'] ?></td>
        <td><?php echo $item['Nationality'] ?></td>
        <td><?php echo $item['Number'] ?></td>
        <td>
            <a href="/products/update?id=<?php echo $item['PlayerID'] ?>" class="btn btn-outline-primary btn-sm">Edit</a>
            <form style="display: inline-block" action="/products/delete" method="post">
                <input type="hidden" name="id" value="<?php echo $item['PlayerID'] ?>">
                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
            </form>
            <a href="/products/info?id=<?php echo $item['PlayerID'] ?>" class="btn btn-outline-primary btn-sm">Info</a>
        </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>