<?= $this->extend('pages/layouts/template'); ?>

<?= $this->section('content'); ?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Post Details</h2>
                <ol>
                    <li><a href=<?= base_url('home'); ?>>Home</a></li>
                    <li><a href=<?= base_url('post-guest'); ?>>Post</a></li>
                    <li>Post Details</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <?php if (session('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session('success'); ?>
                </div>
            <?php endif ?>

            <div class="row g-5">

                <div class="col-lg-8">

                    <article class="blog-details">

                        <div class="post-img">
                            <img src="<?= base_url('assets-admin/img/foto-post/' . $post->foto_post); ?>" alt="foto post" class="img-fluid">
                        </div>

                        <h2 class="title"><?= $post->nama_post; ?></h2>
                        <?php
                        $countComment = $commentModel->getCountCommentPost($post->id_post);
                        $comments = $commentModel->getCommentsByPostId($post->id_post);

                        ?>
                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="">Admin Masjid</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href=""><time>
                                            <?php $newFormat = date("d-M-Y", strtotime($post->created_at));
                                            echo $newFormat
                                            ?></time></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#comments"><?= $countComment; ?> Comments</a></li>
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            <?= $post->deskripsi_post; ?>
                        </div><!-- End post content -->

                        <div class="meta-bottom">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li><a href="#"><?= $post->kategori; ?></a></li>
                            </ul>
                        </div><!-- End meta bottom -->

                    </article><!-- End blog post -->

                    <div class="post-author d-flex align-items-center bg-img-primary">
                        <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="">
                        <div>
                            <h4 class="mb-2">Ayo Makmurkan Masjid</h4>
                            <div class="social-links">
                                <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                            </div>
                            <p>
                                “Sesungguhnya yang memakmurkan masjid Allah hanyalah orang-orang yang beriman kepada Allah dan hari kemudian, serta (tetap) melaksanakan shalat, menunaikan zakat dan tidak takut (kepada apapun) kecuali kepada Allah. Maka mudah-mudahan mereka termasuk orang-orang yang mendapat petunjuk.” <span class="text-black">(QS At Taubah:9)</span>
                            </p>
                        </div>
                    </div><!-- End post author -->

                    <div class="comments" id="comments">

                        <h4 class="comments-count"><?= $countComment; ?> Comments</h4>

                        <?php foreach ($comments as $comments) : ?>
                            <div id="comment-2" class="comment shadow p-3 mb-5 bg-body rounded">
                                <div class="row d-flex p-0">
                                    <div class="comment-img"><img src="<?= base_url('assets/img/foto-user/') . $comments->foto_user; ?>" alt=""></div>
                                    <div>
                                        <h5><a href=""><?= $comments->nama_user; ?></a></h5>
                                        <time datetime="2020-01-01"><?= $comments->created_at; ?></time>
                                        <p>
                                            <?= $comments->comment; ?>
                                        </p>
                                    </div>
                                    <div class="col">
                                        <form action="../comment/add/<?= $post->id_post; ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="post_id" value="<?= $post->id_post ?>">
                                            <input type="hidden" name="user_id" value="<?= user_id() ?>">
                                            <input type="hidden" name="parent_id" value="<?= $comments->id; ?>">
                                            <div class="row d-flex align-items-center justify-content-center ">
                                                <div class="col-md-11">
                                                    <textarea name="comment" class="form-control <?= !logged_in() ? 'disabled' : null; ?>" rows="1" placeholder="Balas Komentar Ini*"></textarea>
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div id="comment-reply-1" class="comment comment-reply">
                                    <div class="row d-flex reply">
                                        <?php $replies = $commentModel->where('parent_id', $comments->id)->findAll(); ?>
                                        <?php foreach ($replies as $reply) : ?>
                                            <div class="row reply p-2 ">
                                                <div class="col">
                                                    <div class="comment-img"><img src="<?= base_url('assets/img/foto-user/') . $reply->foto_user; ?>" alt=""></div>
                                                    <div>
                                                        <h5><a href=""><?= $reply->nama_user; ?></a></h5>
                                                        <time datetime="2020-01-01"><?= $reply->created_at; ?></time>
                                                        <p>
                                                            <a class="text-decoration-none"><?= "@" . $comments->nama_user; ?></a><?= " " . $reply->comment; ?>
                                                        </p>
                                                    </div>
                                                    <div class="col">
                                                        <form action="../comment/add/<?= $post->id_post; ?>" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="post_id" value="<?= $post->id_post ?>">
                                                            <input type="hidden" name="user_id" value="<?= user_id() ?>">
                                                            <input type="hidden" name="parent_id" value="<?= $reply->id; ?>">
                                                            <div class="row d-flex align-items-center justify-content-center ">
                                                                <div class="col-md-11">
                                                                    <textarea name="comment" class="form-control <?= !logged_in() ? 'disabled' : null; ?>" rows="1" placeholder="Balas Komentar Ini*"></textarea>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="comment-reply-2" class="comment comment-reply">
                                                <?php $subReplies = $commentModel->getRepliesByCommentId($reply->id); ?>
                                                <?php foreach ($subReplies as $subReply) : ?>
                                                    <div class="row reply p-2 ">
                                                        <div class="col">
                                                            <div class="comment-img"><img src="<?= base_url('assets/img/foto-user/') . $subReply->foto_user; ?>" alt=""></div>
                                                            <div>
                                                                <h5><a href=""><?= $subReply->nama_user; ?></a></h5>
                                                                <time datetime="2020-01-01"><?= $subReply->created_at; ?></time>
                                                                <p>
                                                                    <a class="text-decoration-none"><?= "@" . $reply->nama_user; ?></a><?= " " . $subReply->comment; ?>
                                                                </p>
                                                            </div>
                                                            <div class="col">
                                                                <form action="../comment/add/<?= $post->id_post; ?>" method="post" enctype="multipart/form-data">
                                                                    <input type="hidden" name="post_id" value="<?= $post->id_post ?>">
                                                                    <input type="hidden" name="user_id" value="<?= user_id() ?>">
                                                                    <input type="hidden" name="parent_id" value="<?= $reply->id; ?>">
                                                                    <div class="row d-flex align-items-center justify-content-center ">
                                                                        <div class="col-md-11">
                                                                            <textarea name="comment" class="form-control <?= !logged_in() ? 'disabled' : null; ?>" rows="1" placeholder="Balas Komentar Ini*"></textarea>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                            </div><!-- End comment #2-->
                        <?php endforeach ?>


                        <div class="reply-form">

                            <h4>Leave a Reply</h4>
                            <?php if (!logged_in()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    Login Terlebih dahulu sebelum komentar
                                </div>
                            <?php endif ?>
                            <form action="../comment/add/<?= $post->id_post; ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="post_id" value="<?= $post->id_post ?>">
                                    <input type="hidden" name="user_id" value="<?= user_id() ?>">
                                    <!-- <input type="hidden" name="parent_id" value=""> -->
                                    <div class="col form-group">
                                        <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary <?= !logged_in() ? 'disabled' : null; ?>">Post Comment</button>

                            </form>

                        </div>

                    </div><!-- End blog comments -->
                </div>

                <div class="col-lg-4 ">
                    <?= $this->include('pages/post/partials/sidebar'); ?>
                </div>
            </div>

        </div>
    </section><!-- End Blog Details Section -->

</main><!-- End #main -->
<?= $this->endSection(); ?>