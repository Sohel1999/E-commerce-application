<?php partial_view('__desh_header') ;?>
    <div class="container-fluid">
        <div class="row">
            <?php partial_view('__desh_sidebar') ;?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Category</h1>
                    <?php partial_view('__notification')?>
                </div>
                 <div class="category-area">
                    <div class="row">
                        <div class="col-xl-7">
                            <form action="/deshboard/categories" method="post">
                                <div class="form-group">
                                    <label for="title">Email address</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug" placeholder="slug">
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
                <div class="show-category-data">
                  <?php if($categories->count() > 0) :?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Category Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                       <?php foreach ($categories as $category):?>
                             
                        <tr>
                            <th scope="row"><?php echo $category->id; ?></th>
                            <td><?php echo $category->title; ?></td>
                            <td><?php echo $category->slug; ?></td>
                            <td> <?php echo $category->active ===1 ? 'Active':'Inactive';?></td>
                            <td>
                                <a href="/deshboard/categories/edit/<?php echo $category->id?>"> Edit</a>
                                <a href="/deshboard/categories/delete/<?php echo $category->id?>" onclick="return confirm('Are you sure')">Delete</a>
                            </td>
                        </tr>

                        <?php endforeach;?>
                        </tbody>
                    </table>
                   <?php else: ?>
                    <div class="alert alert-warning">
                         No Found Category .Add one
                    </div>
                    <?php endif;?>
                </div>
            </main>
        </div>
    </div>
<?php partial_view('__desh-footer');?>