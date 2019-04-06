<?php partial_view('__desh_header') ;?>
    <div class="container-fluid">
        <div class="row">
            <?php partial_view('__desh_sidebar') ;?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Edit Category</h1>
                    <?php partial_view('__notification')?>
                </div>
                <?php
                $category=\App\Models\Category::find($_SESSION['category_id']);

                ?>
                <div class="category-area">
                    <div class="row">
                        <div class="col-xl-7">
                            <form action="/deshboard/categories/edit/<?php echo $category->id;?>" method="post">
                                <div class="form-group">
                                    <label for="title">Email address</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" value="<?php  echo $category->title;?>" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug" value="<?php echo $category->slug;?>">
                                </div>
                                <div class="form-group">
                                    <label for="stauts">Status</label>
                                    <select class="form-control" id="stauts" name="status">
                                        <option value="1" <?php if($category->active===1){echo 'selected';} ?>>Active</option>
                                        <option value="0"<?php if($category->active===0){echo 'selected';}?> >Deactive</option>

                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Category Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
<?php partial_view('__desh-footer');?>