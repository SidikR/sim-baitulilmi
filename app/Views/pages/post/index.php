<?= $this->extend('pages/layouts/template'); ?>

<?= $this->section('content'); ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Posts</h2>
                <ol>
                    <li><a href="<?= base_url('home'); ?>">Home</a></li>
                    <li>Post</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8">

                    <div class="row gy-4 posts-list">

                        <?php foreach ($daftar_post as $post) : ?>
                            <div class="col-lg-6">
                                <article class="d-flex flex-column">

                                    <div class="post-img">
                                        <img src="<?= base_url('assets-admin/img/post/' . $post->foto_post); ?>" alt="" class="img-fluid">
                                    </div>

                                    <h2 class="title">
                                        <a href="<?= base_url('detail/post-' . $post->slug_post); ?>"><?= $post->nama_post; ?></a>
                                    </h2>

                                    <div class="meta-top">
                                        <ul class="col">
                                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a>Admin Masjid</a></li>
                                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time>
                                                        <?php $newFormat = date("d-M-Y", strtotime($post->created_at));
                                                        echo $newFormat
                                                        ?></time></a></li>
                                            <?php $countComment = $commentModel->getCountCommentPost($post->id_post); ?>
                                            <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a><?= $countComment; ?></a></li>
                                        </ul>
                                    </div>

                                    <div class="content-news">
                                        <p>
                                            <?php
                                            $content_news =  $post->deskripsi_post;

                                            // Menghapus semua tag HTML
                                            $strippedContent = strip_tags($content_news);

                                            $news = substr($strippedContent, 0, 70) . "...";

                                            // Memisahkan paragraf menjadi array
                                            $paragraphs = explode("\n", $news);

                                            // Menggabungkan setiap paragraf menjadi elemen <p>
                                            $result = '';
                                            foreach ($paragraphs as $paragraph) {
                                                $result .= "<p>$paragraph</p>";
                                            }

                                            echo $result;
                                            ?>

                                        </p>
                                    </div>

                                    <div class="read-more mt-auto align-self-end">
                                        <a href="<?= base_url('detail/post-' . $post->slug_post); ?>">Read More</a>
                                    </div>

                                </article>
                            </div><!-- End post list item -->
                        <?php endforeach ?>

                    </div><!-- End blog posts list -->

                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <?php echo $pager->links('default'); ?>
                        </ul>
                    </div><!-- End blog pagination -->

                </div>

                <div class="col-lg-4">

                    <?= $this->include('pages/post/partials/sidebar'); ?>

                </div>

            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->
<?= $this->endSection(); ?>