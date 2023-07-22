    <form class="category" action=" ./login.php" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Enter your username">
        </div>
        <button type="submit" class="btn btn-success">create</button>

    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>@mdo</td>
                <td>
                    <button class="btn btn-danger">delete</button>
                    <button class="btn btn-primary">edit</button>
                </td>
            </tr>
        </tbody>
    </table>