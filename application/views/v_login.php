<div class="hold-transition login-page fixed mb-0">
    <!--/. container-fluid -->
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url(); ?>"><b>Edupon</b>maps</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <?php if ($this->session->flashdata('pesan')) : ?>
                    <div class="alert alert-danger" role="alert"> <?= $this->session->flashdata('pesan') ?> </div>
                <?php endif; ?>
                <p class="login-box-msg">Silahkan login</p>

                <?= form_open('auth'); ?>
                <div class="input-group mb-3">
                    <input type="username" id="username" name="username" class="form-control  <?php echo form_error('username') ? 'is-invalid' : '' ?>" placeholder="Username" value="<?= set_value('username'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        <?php echo form_error('username') ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        <?php echo form_error('password') ?>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary btn-block">Login</button>

                <!-- /.col -->
                <?= form_close(); ?>





            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

</div>