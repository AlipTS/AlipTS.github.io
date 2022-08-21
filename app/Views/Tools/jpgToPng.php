<?= $this->extend('Templates/template'); ?>
<?= $this->section('content'); ?>
<section class="page-section bg-primary" id="jpgToPng">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-8">

                <form action="tools/jpgToPng" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="fileJpgToPng" name="fileJpgToPng" accept="image/jpeg">
                        </div>
                    </div>
                    <button type="submit">CONVERT</button>
                </form>

            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>