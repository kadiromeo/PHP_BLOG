        <footer class="footer col-md-12">
            <div class="container">
                <div class="row ">
                    <div class="col-md-4">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="<?php echo $ayarcek['twitter'] ?>">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="<?php echo $ayarcek['facebook'] ?>">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="<?php echo $ayarcek['github'] ?>">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="<?php echo $ayarcek['youtube'] ?>">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-youtube fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="<?php echo $ayarcek['instagram'] ?>">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>

                    </div>

                    <div class="col-md-4">
                    </div>

                    <div class="footer-newsletter col-md-4">
                        <h6>Abone Olun!</h6>
                        <form action="islem" method="post">
                            <input  type="email" name="abone" placeholder="E-Mail Giriniz" required="" />
                            <button name="aboneol" type="submit" id="mc-submit">Abone Ol!</button>      
                        </form>
                    </div>

                </div>
                <div class="small text-center text-muted fst-italic">Copyright &copy; <?php echo $ayarcek['yazar'] ?></div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../assets/js/scripts.js"></script>



    </body>
    </html>
