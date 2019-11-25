<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <header class="panel-heading">
                <h1>Category</h1>
                <a href="?c=category&a=Create" class="btn btn-success">Create</a>
            </header>
            <div class="panel-body">
                <table class="table table-striped table-hover dt-datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($MODEL as $category) {
                            ?>
                            <tr>
                                <td><?= $category->getId() ?></td>
                                <td><?= $category->getCategory() ?></td>
                                <td id="userButtons-cell">
                                    <a class="fa fa-pencil btn btn-warning btn-sm" href="?c=category&a=Edit&id=<?= $category->getId() ?>"></a>
                                    <a class="fa fa-trash btn btn-danger btn-sm" href="?c=category&a=Delete&id=<?= $category->getId() ?>"></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>