<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-3">
        <div class='row'>

            <form method="post" action="" class="mx-auto col-md-6">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="name">
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" placeholder="Enter price" name="price">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" placeholder="Enter description" name="description">
                </div>
               
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>

</body>

</html>