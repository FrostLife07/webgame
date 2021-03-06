<?php

/* 
 * Template Name: Create Guide
 */

?>

<?php get_header(); ?>
<!--#blocks-wrapper-->
<div id="blocks-wrapper" class="clearfix">

    <div id="game-guide">        
        <?php ?>       
        <div class="post-content">
            <?php 
            
                    if(isset($_GET['izguide']) && isset($_GET['edit'])){
                        $guide_id = $_GET['izguide'];
                        $guide = get_post($guide_id);
                    }
            ?>
            <h1 class="entry-title" style="font-size: 24px; color: #fff;"><?php if($guide) echo 'Sửa bài viết'; else the_title(); ?></h1>
            
            <div class="entry-content">
                <div class="meta_author">
                    
                </div>
                <div class="posted-status">
                    <p>
                    <?php
                    if(isset($_GET['posted'])){
                        if($_GET['posted'] == 'failed'){
                            echo __('<span class="error">Có lỗi xảy ra! Có thể bạn chưa chọn Tướng hoặc Thể loại', 'iz_theme</span>');
                        }else{
                            echo __('<span class="success">Bài viết của bạn đã được đăng thành công</span>');
                        }
                    }
                    ?>
                    </p>
                </div>
                
                <?php if(is_user_logged_in()){ ?>
                
                <div class="guide-form">
                    <form method="post" action="" class="form-horizontal new-guide-form">
                        <div class="form-group title">
                            <label class="col-sm-2"><?= __('Tiêu đề', 'iz_theme'); ?></label>
                            <div class="col-sm-10">
                                <input type="text" value='<?php if($guide) echo $guide->post_title; ?>' class="form-control guide-title" name="guide-title" required="" />
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="box-select">
                                <?php $champions = get_posts(array(
                                    'post_type' => 'fl_champion',
                                    'hide_empty' => false
                                )); ?>

                                <label class="col-sm-2"><?= __('Chọn tướng', 'iz_theme'); ?></label>

                                <div>
                                    <?php 
                                    if($guide_id){
                                        $guide_champs = get_post_meta($guide_id, 'iz-guide-champion', true);
                                    }else{
                                        $guide_champs = 0;
                                    }
                                    ?>
                                <select name="guide-champion" id="guide-champion" required="">
                                    <option value="0">Chọn tướng</option>
                                    <?php foreach ($champions as $ch){ ?>
                                    <option value="<?php echo $ch->ID ?>" <?php selected($ch->ID, $guide_champs, true); ?>><?php echo $ch->post_title ?></option>
                                    <?php } ?>
                                </select>
                                </div>

                                <div class="col-sm-10 list-champions">
                                    
                                    <?php foreach ($champions as $ch){ ?>
                                    <div class="iz-champion <?php if($guide_champs == $ch->ID) echo 'ch-select'; ?>">
                                        <a href="#" data-id="<?php echo $ch->ID ?>" title="<?php echo $ch->post_title ?>">
                                            <img src="<?php echo get_post_meta($ch->ID, 'iz-ch-face', true); ?>" alt="Heroes" />
                                        </a>
                                    </div>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="box-select list-guide-cat" style="margin-top: 42px;">
                            
                                <?php 
                                $guide_cats = get_terms('fl_guide_cat', array('hide_empty'=>false)); 
                                if($guide_id){
                                    $currentcats = get_the_terms($guide_id, 'fl_guide_cat');
                                }else{
                                    $currentcats = null; 
                                }
                                ?>
                                <label class="col-sm-2"><?php echo __('Chọn thể loại', 'iz_theme') ?></label>
                                
                                <div class="col-sm-10">
                                    <div class="select-guide-cat" style="background: #fff; height: 150px; padding: 10px; overflow: auto;">
                                        <?php 
                                        foreach ($guide_cats as $cat){ 
                                            $check = '';
                                            if($currentcats){
                                                foreach ($currentcats as $ccat){
                                                    if($cat->term_id == $ccat->term_id){
                                                        $check = 'checked';
                                                        break;
                                                    }
                                                }
                                            }
                                            ?>
                                        <div><label style="min-width: 200px; width: auto; color: #000;"><input class="" <?php echo $check; ?> type="checkbox" name="guide-cat[]" value="<?php echo $cat->term_id ?>" /> <?php echo $cat->name ?></label></div>
                                        <?php 
                                        } 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class=" guide-thumbnail" style="margin-top: 20px;">
                                <label class="col-sm-2"><?php echo __('Chọn Ảnh tiêu biểu', 'iz_theme') ?></label>
                                <div class="col-sm-10">
                                    
                                    <?php if($guide_id){
                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($guide_id), 'pager');
                                        
                                    }else{
                                        $image = '';
                                    } ?>
                                    
                                    <img class="show-thumbnail" src="<?php if($image == '') echo get_template_directory_uri().'/images/iz_images/default.jpeg'; else echo $image[0]; ?>" />
                                    <input type="hidden" name="guide-thumbnail" class="guide-thumbnail-value" value="" />
                                    <input type="hidden" name="attach-id" value="" class="attach-id" />
                                    <input type="hidden" name="thumbnail-type" class="thumbnail-type" value="" />
                                    <input type="hidden" name="thumbnail-name" class="thumbnail-name" value="" />
                                    <a class="btn btn-default" id="guide-upload"><?php echo __('Upload', 'iz_theme') ?></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="guide-content form-group">
                            <label class="col-sm-2"><?= __('Nội dung', 'iz_theme'); ?> <span style="color: #c4eae1;"> </span></label>
                            <div class="col-sm-10">
                                <?php $content = '';
                                if($guide) $content = $guide->post_content;
                                ?>
                                <?php wp_editor($content, 'guide-content', array('textarea_rows'=>13, 'media_buttons'=>false)); ?>
                            </div>
                        </div>
                        <script>
//                            jQuery('#guide-content-tmce').click();
                        </script>
                        
                        <div class="guide-submit form-group">
                            <input type="hidden" name="current-url" value="<?php the_permalink() ?>" />
                            <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
                            <input type="hidden" name="post_type" value="fl_guide" />
                            <input type="hidden" name="post_action" value="<?php if($guide_id) echo 'edit_post'; else echo 'create_post'; ?>" />
                            <?php
                            if($guide_id){ ?>
                            <input type="hidden" name="post_edit_id" value="<?php echo $guide_id; ?>" />
                            <?php }
                            ?>
                            <div class="col-sm-10 col-sm-offset-2">
                                <input type="submit" name="submit-new-guide" value="<?php if($guide) echo __('Cập nhật', 'iz_theme'); else echo __('Tạo Guide', 'iz_theme') ?>" />
                            </div>
                        </div>
                    </form>
                </div>
                <?php }else{ ?>
                <h4>Bạn phải đăng nhập để tạo hướng dẫn, Nếu chưa có tài khoản vui lòng <a href="<?php echo get_page_link(1262) ?>">Đăng ký</a></h4>
                <?php } ?>
            </div>
        </div>
        
    </div>
</div>
 
 <?php get_footer(); ?>


