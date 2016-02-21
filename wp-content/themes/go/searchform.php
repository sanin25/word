<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="red-tooltip" data-toggle="tooltip" data-placement="top" title="Для поиска нажмите Enter">
        <input class="input-mini" type="text" placeholder="Для поиска нажмите Enter" value="<?php echo get_search_query(); ?>" name="s" id="s" />
       
    </div>

</form>
