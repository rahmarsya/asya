<div class="container">
    <h3 class="mt-3"> List of People</h3>

<div class="row">
    <div class="col-md-5">
        <form action="<?= base_url('people'); ?>" method="post">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search keyword..." name="keyword" autocomplete="off" autofocus>
        <div class="input-group-append">
            <input class="btn btn-primary" type="submit" name="submit">
            </div>
        </div>
        </form>
    </div>
</div>

    <div class="row">
        <div class="col-md-10">
        <h5> Results : <?= $total_row; ?></h5>
    <table class="table">
        <thead>
            <tr>
               <th>#</th>
               <th>Name</th>
               <th>Email</th>
               <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if( empty($people)) : ?>
                <tr>
                    <td colspan="4">
                        <div class="alert alert-danger" role="alert">
                            data not found!
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            <?php $i = 1; foreach( $people as $people ) : ?>
            <tr>
                <th><?= ++$start; ?></th>
                <td><?= $people['name']; ?></td>
                <td><?= $people['email']; ?></td>
                <td>
                    <a href="" class="badge text-bg-warning">detail</a>
                    <a href="" class="badge text-bg-success">edit</a>
                    <a href="" class="badge text-bg-danger">delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
 
    <?= $this->pagination->create_links(); ?>

        </div>
    </div>
</div>