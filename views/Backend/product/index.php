<?php partial_view('__desh_header') ;?>
    <div class="container-fluid">
        <div class="row">
            <?php partial_view('__desh_sidebar') ;?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Products</h1>
                    <?php partial_view('__notification')?>
                </div>
                <?php $categories=\App\Models\Category::Where('active',1)->orderBy('title','asc')->get();
                ?>
                <div class="category-area">
                    <div class="row">
                        <div class="col-xl-7">
                            <form action="/deshboard/products" method="post">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="" > -- Please Select Category--</option>
                                        <?php foreach ($categories as $category):?>

                                            <option value="<?php echo $category->id;?>" > <?php echo $category->title;?> </option>
                                          <?php endforeach;?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug" placeholder="slug">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" name="price" id="price" placeholder="price">
                                </div>
                                <div class="form-group">
                                    <label for="sales_price"> Sales Price</label>
                                    <input type="text" class="form-control" name="sales_price" id="price" placeholder="sales price">
                                </div>

                                <div class="form-group">
                                    <label for="stauts">Status</label>
                                    <select class="form-control" id="stauts" name="status">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Deactive</option>

                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Category add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
<?php partial_view('__desh-footer');?>