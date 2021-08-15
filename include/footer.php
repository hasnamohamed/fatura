            </div><!-- /.blog-main -->
            <aside class="col-md-4 blog-sidebar">
                <div class="p-4 mb-3 bg-light rounded">
                    <h4 class="font-italic">About</h4>
                    <p class="mb-0"><?php echo $about; ?></p>
                </div>

                <div class="p-4">
                    <h4 class="font-italic">Categories</h4>
                    <?php if ($categories) : ?>
                        <ol class="list-unstyled mb-0">
                            <?php while ($row = $categories->fetch_assoc()) : ?>
                                <li><a href="posts.php?category=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
                            <?php endwhile; ?>
                        </ol>
                    <?php else : ?>
                        <p>There are no categories</p>
                    <?php endif; ?>
                </div>
            </aside><!-- /.blog-sidebar -->

            </div><!-- /.row -->

            </main><!-- /.container -->

            <footer class="blog-footer">
                <p>Test Blog built for <strong>FATURA</strong> . &copy 2021</p>
            </footer>
            </body>

            </html>