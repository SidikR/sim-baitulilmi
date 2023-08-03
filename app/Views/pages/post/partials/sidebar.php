<div class=" sidebar bg-img-primary">

    <!-- <div class="sidebar-item search-form">
        <h3 class="sidebar-title">Search</h3>
        <form action="" class="mt-3">
            <input type="text">
            <button type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>End sidebar search formn -->

    <div class="sidebar-item categories">
        <h3 class="sidebar-title">Categories</h3>
        <ul class="mt-3">
            <?php foreach ($uniqe_kategori as $kt) : ?>
                <li><a href="#"><?= $kt->kategori; ?><span><?= "( " . $kt->total . " )"; ?></span></a></li>
            <?php endforeach ?>
        </ul>
    </div><!-- End sidebar categories-->

    <div class="sidebar-item recent-posts">
        <h3 class=" sidebar-title">Recent Posts</h3>

        <div class="mt-3">
            <?php foreach ($daftar_post as $post) : ?>
                <div class="post-item mt-3">
                    <img src="<?= base_url('assets-admin/img/foto-post/' . $post->foto_post); ?>" alt="" class="">
                    <div>
                        <h4><a href="<?= base_url('detail/post-' . $post->slug_post); ?>"><?= $post->nama_post; ?></a></h4>
                        <time><?php $newFormat = date("d-M-Y", strtotime($post->created_at));
                                echo $newFormat
                                ?></time>
                    </div>
                </div><!-- End recent post item-->
            <?php endforeach ?>

        </div>

    </div><!-- End sidebar recent posts-->

</div><!-- End Blog Sidebar -->