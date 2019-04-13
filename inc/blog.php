<?php include "db.php"; ?>


	<div  class='blog-container col'>
						<h3>Blog</h3>
						<select name='categories' id='categories' >
							<option value=''>Select Category</option>
							<?php  
							$query = 'SELECT * FROM categories';
                    $select_all_cateories_query = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_all_cateories_query)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];

                     

                        if(isset($_GET['category']) && $_GET['category'] == $cat_id) {
                     		
                     		echo 'slected';                        
                     
                    }
							 echo "<option id='option' value='{$cat_title}.php'>{$cat_title}</option> ";}?>
						</select>
					</div>

					<?php  
 $stmt1 = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_category_id = ? ");
                    
                         $stmt2 = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_category_id = ?  AND post_status = ?");
                         $published = 'published';
                  
                    
                        if(isset($stmt1)) {
                            mysqli_stmt_bind_param($stmt1, "i", $post_category_id);//the i is for integer
                            
                            mysqli_stmt_execute($stmt1);
                            
                            mysqli_stmt_bind_result($stmt1, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);

                            $stmt = $stmt1;
                        } else {
                            mysqli_stmt_bind_param($stmt2, "is", $post_category_id, $published);//the i is for integer s is for string//cannot put a string here. we need to make $published a variable
                            mysqli_stmt_execute($stmt2);

                            mysqli_stmt_bind_result($stmt2, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);

                            $stmt = $stmt2;
                        }
                    
                    mysqli_stmt_store_result($stmt);//store the result of the query, otherwise the condition below will allways be true
                    if(mysqli_stmt_num_rows($stmt) === 0) {
                        echo "<h1 class='text-center'>No Categories Available.</h1>";
                    }


                    while(mysqli_stmt_fetch($stmt)):
                        

                        
                     
                    
                ?>
            
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="/cms_template/images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php endwhile; mysqli_stmt_close($stmt); ?>

