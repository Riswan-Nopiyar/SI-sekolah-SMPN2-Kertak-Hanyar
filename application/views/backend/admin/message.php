<?php
$page_title         = $judulHalaman;
?>

<h3>
    <i class="entypo-right-circled"></i>
    <?php echo $page_title; ?>
</h3>
<hr />
<div class="mail-env">

    <!-- Mail Body -->
    <div class="mail-body">

        <!-- message page body -->
        <div class="mail-header">
            <!-- title -->
            <h3 class="mail-title">
                <?php echo ('Messages'); ?>
            </h3>

            <!-- search -->
            <form method="get" role="form" class="mail-search">
                <div class="input-group">
                    <input type="text" class="form-control" name="s" placeholder="Search for mail..." />

                    <div class="input-group-addon">
                        <i class="entypo-search"></i>
                    </div>
                </div>
            </form>
        </div>

        <div style="width:100%; text-align:center;padding:100px;color:#aaa;">

            <img src="<?php echo base_url(); ?>assets/images/inbox.png" width="70">
            <br><br>
            <div>
                Select a message to read
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="mail-sidebar" style="min-height: 800px;">

        <!-- compose new email button -->
        <div class="mail-sidebar-row hidden-xs">
            <a href="<?php echo base_url(); ?>index.php?teacher/message/message_new" class="btn btn-success btn-icon btn-block">
                <?php echo ('New Message'); ?>
                <i class="entypo-pencil"></i>
            </a>
        </div>

        <!-- message user inbox list -->
        <ul class="mail-menu">
            <?php
            $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

            $this->db->where('sender', $current_user);
            $this->db->or_where('reciever', $current_user);
            $message_threads = $this->db->get('message_thread')->result_array();
            foreach ($message_threads as $row) :
                if ($row['sender'] == $current_user)
                    $user_to_show = explode('-', $row['reciever']);

                if ($row['reciever'] == $current_user)
                    $user_to_show = explode('-', $row['sender']);

                $user_to_show_type = $user_to_show[0];
                if ($user_to_show_type == "student") {
                    $user_to_show_types = "siswa";
                } elseif ($user_to_show_type == "teacher") {
                    $user_to_show_types = "guru";
                } elseif ($user_to_show_type == "parent") {
                    $user_to_show_types = "wali";
                } else {
                    $user_to_show_types = $user_to_show_type;
                }

                $user_to_show_id = $user_to_show[1];
                $unread_message_number = $this->myModel->count_unread_message_of_thread($row['message_thread_code']);
            ?>
                <li class="<?php if (isset($current_message_thread_code) && $current_message_thread_code == $row['message_thread_code']) echo 'active'; ?>">
                    <a href="<?php echo base_url('admin/pesan/baca/' . $row['message_thread_code']); ?>" style="padding:12px;">
                        <i class="entypo-dot"></i>
                        <?php echo $this->db->get_where($user_to_show_types, array($user_to_show_type . '_id' => $user_to_show_id))->row()->name; ?>

                        <span class="badge badge-default pull-right" style="color:#aaa;"><?php echo $user_to_show_type; ?></span>

                        <?php if ($unread_message_number > 0) : ?>
                            <span class="badge badge-secondary pull-right">
                                <?php echo $unread_message_number; ?>
                            </span>
                        <?php endif; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>

</div>