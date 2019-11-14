 <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                        <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                 <!-- Blog login Well -->
                <div class="well">
                    <h4>Log In</h4>
                    <form action="includes/login.php" method="post">
                       <div class="form-group">
                           <input type="text" class="form-control" name="username" placeholder="Enter Username">
                       </div>
                       <div class="input-group">
                           <input type="password" class="form-control" name="password" placeholder="Enter Password">
                           <span class="input-group-btn">
                               <button class="btn btn-primary" name="login" type="submit">Submit</button>
                           </span>
                       </div>
                    </form>
                    <!-- /.input-group -->
                </div>


                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                  <?php

                    $query="SELECT * FROM categories";
                    $select_cat=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_cat)){
                    ?>
                    <li><a href="category.php?category=<?php echo $row['cat_id'];?>"><?php echo $row["cat_title"];?></a></li>

                    <?php 
                        }

                    ?>
                            </ul>
                        </div>
                    
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>