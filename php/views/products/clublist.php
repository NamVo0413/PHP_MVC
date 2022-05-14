<h1>Club CRUD</h1>
<p>
    <a href="/clublist/create" class="btn btn-success">Create Club</a>
</p>
<p>
    <a href="/" class="btn btn-success">Home Page</a>
</p>
<form>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search Player" name="search" value="<?php echo $search ?>">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
</form>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">ClubID</th>
        <th scope="col">ClubName</th>
        <th scope="col">ShortName</th>
        <th scope="col">StadiumID</th>
        <th scope="col">CoachID</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($clubList as $i => $item): ?>
        <th scope="row"><?php echo $i +1 ?></th>
        <td><?php echo $item['ClubID'] ?></td>
        <td><?php echo $item['ClubName'] ?></td>
        <td><?php echo $item['Shortname'] ?></td>
        <td><?php echo $item['StadiumID'] ?></td>
        <td><?php echo $item['CoachID'] ?></td>
        <td>
            <a href="/clublist/update?id=<?php echo $item['ClubID'] ?>" class="btn btn-outline-primary btn-sm">Edit</a>
            <form style="display: inline-block" action="/clublist/delete" method="post">
                <input type="hidden" name="id" value="<?php echo $item['ClubID'] ?>">
                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
            </form>
            <a href="/clublist/playerlist?id=<?php echo $item['ClubID'] ?>" class="btn btn-outline-primary btn-sm">Player List</a>
        </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

