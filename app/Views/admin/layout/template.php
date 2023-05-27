<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title; ?></title>
    <link href="<?php echo base_url('assets-admin/css/styles.css'); ?>" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <!-- Bootstraps Icon -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url('assets/vendor/aos/aos.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet">
    <!-- <link href="assets/css/style.css" rel="stylesheet"> -->

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="<?php echo base_url('assets/css/variables.css'); ?>" rel="stylesheet">

    <style>
        .image_upload>input {
            display: none;
        }
    </style>
</head>

<body class="sb-nav-fixed">

    <?= $this->include('admin/layout/topnav'); ?>
    <div id="layoutSidenav">
        <?= $this->include('admin/layout/sidebar'); ?>
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Vendor JS Files -->
    <script src=<?php echo base_url('assets/vendor/aos/aos.js'); ?>></script>
    <script src=<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>></script>
    <script src=<?php echo base_url('assets/vendor/glightbox/js/glightbox.min.js'); ?>></script>
    <script src=<?php echo base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js'); ?>></script>
    <script src=<?php echo base_url('assets/vendor/swiper/swiper-bundle.min.js'); ?>></script>
    <script src=<?php echo base_url('assets/vendor/waypoints/noframework.waypoints.js'); ?>></script>
    <script src=<?php echo base_url('assets/vendor/php-email-form/validate.js'); ?>></script>

    <!-- Template Main JS File -->
    <script src=<?php echo base_url('assets/js/main.js'); ?>></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
    <script src="<?php echo base_url('assets-admin/js/scripts.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets-admin/demo/chart-area-demo.js'); ?>"></script>
    <script src="<?php echo base_url('assets-admin/demo/chart-bar-demo.js'); ?>"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- Awesom Font -->
    <script src="https://kit.fontawesome.com/9a976d004b.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#admin_inventaris').DataTable({
                "columns": [{
                        "width": "1%"
                    },
                    {
                        "width": "20%"
                    },
                    {
                        "width": "10%"
                    },
                    {
                        "width": "15%"
                    },
                    {
                        "width": "20%"
                    },
                    {
                        "width": "20%"
                    },
                    {
                        "width": "14%"
                    }
                ],
                dom: 'Bflrtip',
                buttons: [{
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    'colvis',
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All'],
                ],

            });

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#admin_peminjaman').DataTable({
                // "order": [
                //     [0, "asc"]
                // ],
                // "ordering": true,
                dom: 'Blfrtip',
                buttons: [{
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All'],
                ],
                scrollX: true,
            });
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = $('.date_range_filter').val();
                    var max = $('.date_range_filter2').val();
                    var createdAt = data[1]; // -> rubah angka 4 sesuai posisi tanggal pada tabelmu, dimulai dari angka 0
                    if (
                        (min == "" || max == "") ||
                        (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
                    ) {
                        return true;
                    }
                    return false;
                }
            );
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var akun = $('.akun_keuangan').val();
                    var createdAt = data[2]; // -> rubah angka 4 sesuai posisi tanggal pada tabelmu, dimulai dari angka 0
                    if (
                        (akun == createdAt || akun == '--Pilih Akun Keuangan--') ||
                        moment(createdAt).isSame(akun)
                    ) {
                        return true;
                    }
                    return false;
                }
            );
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var akses = $('.akses_keuangan').val();
                    var createdAt = data[3]; // -> rubah angka 4 sesuai posisi tanggal pada tabelmu, dimulai dari angka 0
                    if (
                        (akses == createdAt || akses == '--Pilih Akses Keuangan--') ||
                        moment(createdAt).isSame(akses)
                    ) {
                        return true;
                    }
                    return false;
                }
            );
            $('.pickdate').each(function() {
                $(this).datepicker({
                    format: 'yyyy/mm/dd'
                });
            });
            $('.pickdate').change(function() {
                table.draw();
            });
            $('.akun_k').change(function() {
                table.draw();
            });
            $('.akses_k').change(function() {
                table.draw();
            });
            $('.masuk , .keluar , .buku_besar').click(function() {
                table.draw();
            });
            $('.reset').click(function() {
                document.getElementById('form').reset()
                table.draw();
            });
        });
    </script>

</body>

</html>