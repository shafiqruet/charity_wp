<?php
$cssCode = '';
$width_sidebar   = '';
$layout  = 'layout_1c';


$layout_sidebar = apply_filters( 'asting_get_layout', '' );
$layout = is_array( $layout_sidebar ) ? $layout_sidebar[0] : 'layout_1c';
$width_sidebar = is_array( $layout_sidebar ) ? $layout_sidebar[1] : '';




$width_site = apply_filters( 'asting_width_site', '' );
$boxed_container_width = get_theme_mod( 'global_boxed_container_width', '1170' );
$global_boxed_offset = get_theme_mod( 'global_boxed_offset', '20' );


if ($width_sidebar && 'layout_1c' != $layout){
    $cssCode .= <<<CSS
   
@media (min-width: 769px){
    #sidebar-woo{
        flex: 0 0 {$width_sidebar}px;
        max-width: {$width_sidebar}px;
        padding: 0;
    }
    
    #main-content-woo{
        flex: 0 0 calc(100% - {$width_sidebar}px);
        max-width: calc(100% - {$width_sidebar}px);
        padding-right: 60px;
        padding-left: 0;
    }
}

@media(max-width: 768px){
    #sidebar-woo, #main-content-woo{
        flex: 0 0 100%;
        max-width: 100%;
    }
    
}

CSS;
}

if( $layout == 'layout_2l' ){
    $cssCode .= <<<CSS

    @media (min-width: 769px){
        .wrap_site{
            flex-direction: row-reverse;
        }
        #main-content-woo{
            padding-left: 60px;
            padding-right: 0;
        }
        
    }
    @media(min-width: 769px) and (max-width: 1170px){
        #main-content-woo{
            padding-left: 30px;
            padding-right: 0;
        }
    }

CSS;
}

if( $width_site == 'boxed' ){
    $cssCode .= <<<CSS
.ova-wrapp{
    max-width: {$boxed_container_width}px;
    margin: 0 auto;
    background-color: #fff;
    padding: {$global_boxed_offset}px;
}
.wrap_site{
    padding: 0;
}

CSS;

}

return $cssCode;
