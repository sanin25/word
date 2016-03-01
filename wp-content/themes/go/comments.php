<?php 
/**
 * Чистый Шаблон для разработки
 * Шаблон вывода поста
 * @package WordPress
 * @subpackage clean
 */
?>
<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Прямой вызов запрещен!');

    if ( post_password_required() ) { ?>
        <p class="nocomments">Пост защищен паролем. Введите и комментируйте!</p>
    <?php
        return;
    }
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>

    <h3 id="comments"><?php comments_number('Нет комментариев', '1 комментарий', '% коментариев' );?> к записи &#8220;<?php the_title(); ?>&#8221;</h3>

<?php

function mytheme_comment($comment, $args, $depth){
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div class="comment_wrap" id="comment-<?php comment_ID(); ?>">
         <div class="comearea">
        <div class="comall">
                <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a>
               <?php echo get_avatar($comment,$size='64',$default='http://1.gravatar.com/avatar/df570c18646109a825ae4acc8d13712d?s=64&d=&r=G' ); ?>
               <?php printf(__('<p class="author">%s</p>'), get_comment_author_link()) ?>
               <div class="reply">
                   <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?> <br/>  <?php edit_comment_link(__('(Edit)'),'  ','') ?>
               </div>
        </div>
            <div class="comtxt">
                   <?php if ($comment->comment_approved == '0') { ?>
               <em><?php _e('Your comment is awaiting moderation.') ?></em>
               <br />
               <?php }else{comment_text();} ?>
            </div>
         </div>
     </div>
<?php
}
?>

    <div class="navigation">
        <div class="alignleft"><?php previous_comments_link() ?></div>
        <div class="alignright"><?php next_comments_link() ?></div>
    </div>
 <?php else : // this is displayed if there are no comments so far ?>

    <?php if ('open' == $post->comment_status) : ?>
        <!-- If comments are open, but there are no comments. -->

     <?php else : // comments are closed ?>
        <!-- If comments are closed. -->
        <p class="nocomments">Комментирование закрыто</p>

    <?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
<div id="respond">

<h3><?php comment_form_title( 'Оставь свой отзыв', 'Ответить %s' ); ?></h3>

<div class="cancel-comment-reply">
    <small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Вы должны быть <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">авторизированы</a> чтобы оставить комментарий</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Вы вошли как <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"> Выйти &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small>Имя <?php if ($req) echo "(обязательно)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small>Email (не будет опубликовано) <?php if ($req) echo "(обязательно)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Сайт</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> Вы можете использовать теги: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Отправить" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>

<ol class="commentlist">
<?php wp_list_comments(array('callback'=>'mytheme_comment')); ?>
</ol>