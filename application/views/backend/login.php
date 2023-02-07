<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $system_name    =    $this->db->get_where('setting', array('id' => '1'))->row()->system_name;
    $system_title    =    $this->db->get_where('setting', array('id' => '1'))->row()->system_title;
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <title><?php echo ('Login'); ?> | <?php echo $system_title; ?></title>


    <link rel="stylesheet" href="<?= base_url('assets/vendors/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/font-icons/entypo/css/entypo.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/neon-core.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/neon-theme.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/neon-forms.css') ?>">

    <script src="<?= base_url('assets/js/jquery-1.11.0.min.js') ?>"></script>
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo.png') ?>">

</head>

<body class="page-body login-page login-form-fall" data-url="">
    <script type="text/javascript">
        var baseurl = '<?php echo base_url(); ?>';
    </script>
    <div class="login-container">
        <div class="login-header login-caret">
            <div class="login-content" style="width:100%;">
                <a href="<?php echo base_url(); ?>" class="logo">
                    <img src="<?= base_url('assets/images/logo.png') ?>" style="height:100px;" alt="" />
                </a>
                <p class="description">
                <h2 style="color:#cacaca; font-weight:100;">
                    <?php echo $system_name; ?>
                </h2>
                </p>
                <!-- progress bar indicator -->
                <!-- <div class="login-progressbar-indicator">
                    <h3>43%</h3>
                    <span>Logging you in....</span>
                </div> -->
            </div>
        </div>
        <!-- <div class="login-progressbar">
            <div></div>
        </div> -->
        <div class="login-form">
            <div class="login-content">
                <?= $this->session->flashdata('pesan') ?>
                <?php echo form_open(base_url('login')); ?>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-user"></i>
                        </div>
                        <input type="mail" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off" data-mask="email" />
                    </div>
                    <?= form_error('email') ?>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                    </div>
                    <?= form_error('password') ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-login">
                        <i class="entypo-login"></i>
                        Login
                    </button>
                </div>
                </form>
                <div class="login-bottom-links">
                    <A href="<?php echo base_url(); ?>index.php?login/forgot_password" class="link">
                        forgot_your_password?
                    </A>
                </div>
                <style>
                    td {
                        border: 1px solid rgba(204, 204, 204, 0.1) !important;
                    }

                    th {
                        border: 1px solid rgba(204, 204, 204, 0.1) !important;
                        background-color: rgba(235, 235, 235, 0) !important;
                    }

                    .icon-hover {
                        cursor: pointer;
                    }
                </style>
                <script>
                    function copy(email, password) {
                        document.getElementById("email").value = email;
                        document.getElementById("password").value = password;
                    }
                </script>
            </div>
        </div>
    </div>
    <!-- Bottom Scripts -->
    <script src="<?= base_url('assets/vendors/gsap/main-gsap.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/js/joinable.js') ?>"></script>
    <script src="<?= base_url('assets/js/resizeable.js') ?>"></script>
    <script src="<?= base_url('assets/js/neon-api.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/neon-login.js') ?>"></script>
    <script src="<?= base_url('assets/js/neon-custom.js') ?>"></script>
    <script src="<?= base_url('assets/js/neon-demo.js') ?>"></script>

</body>

</html>