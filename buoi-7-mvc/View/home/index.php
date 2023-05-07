<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container">

        <div class="text-right">
            <a href="/product/add" class="btn btn-primary mt-3 text-light">Create</a>
        </div>
        

        <div class="row">
            <h2 class="mt-3">List Product</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($productInfor as $key => $product) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $key + 1 ?></th>
                            <td><?php echo $product->name ?></td>
                            <td><?php echo $product->price ?></td>
                            <td><?php echo $product->description ?></td>
                            <td>
                                <a href="/product/edit?id=<?php echo $product->id ?>" class="btn btn-primary mt-3 text-light">Edit</a>
                            </td>
                        </tr>

                    <?php } ?>
                  
                </tbody>
            </table>
        </div>
    </div>
   

</body>

</html>