<h1>Player List</h1>
<p>
    <a href="/" class="btn btn-success">Home Page</a>
</p>
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
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>