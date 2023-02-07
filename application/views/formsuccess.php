<html>

<head>
    <title>My Form</title>
</head>

<body>
    <?= $this->session->flashdata('pesan') ?>
    <?= $this->session->userdata('login_type') ?>
    <h3>Your form was successfully submitted!</h3>

    <p><?php echo anchor(base_url('login'), 'Try it again!'); ?></p>

</body>

</html>