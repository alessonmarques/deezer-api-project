<?php
    $type = 'tracks';
    $id   = '76228435';
?>
{{-- https://www.deezer.com/plugins/player?
                                            type=tracks&
                                            id=3135556&
                                            format=classic&
                                            color=007FEB&
                                            autoplay=false&
                                            playlist=true&
                                            width=700&
                                            height=240
--}}
<iframe
    id='dzplayer'
    dztype='dzplayer'
    src='https://www.deezer.com/plugins/player?type={{$type}}&id={{$id}}&format=classic&color=ef5466&autoplay=false&playlist=true&width=300&height=62'
    scrolling='no'
    frameborder='0'
    style='border:none; overflow:hidden; height: 62px;'
    width='100%'
    height='100'
    allowTransparency='true'>
</iframe>
