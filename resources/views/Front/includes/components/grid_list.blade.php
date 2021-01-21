<?php
    use app\Support\Album;
    use app\Support\Artist;
    use app\Support\Playlist;
    use app\Support\Radio;
    use app\Support\Track;


?>
<div    class="row py-2 px-2 d-block"
        style="overflow: hidden;">
    <h4 class="font-weight-bold">{{ ucwords($type) }}</h4>
    <hr>
    <div    id="card_n#"
            class="card-deck card-list-itens"
            style="width: 161vw" >

        @foreach ($itens as $item)
            <?php

                $deezerObject       = new \stdClass();

                switch($item->type)
                {
                    case 'album':
                        $deezerObject = new Album();
                    break;
                    case 'artist':
                        $deezerObject = new Artist();
                    break;
                    case 'playlist':
                        $deezerObject = new Playlist();
                    break;
                    case 'radio':
                        $deezerObject = new Radio();
                    break;
                    case 'track':
                        $deezerObject = new Track();
                    break;

                    default:
                        dd($item);
                    break;
                }


                $gridObjectData    = $deezerObject->getGridData($item);

                $cover             = $gridObjectData->cover;
                $title             = strlen($gridObjectData->title) > MAX_CARATCTER_NAME ? substr($gridObjectData->title, MAX_CARATCTER_NAME_START, MAX_CARATCTER_NAME_LIMIT)."..." : $gridObjectData->title;

                $description       = $gridObjectData->description;
                $access_link       = $gridObjectData->access_link;
                $play_link         = $gridObjectData->play_link;

            ?>

            <div class="card bg-dark" >
                <div class="d-flex" >
                    <div class="card-img-top" >
                        <a href="{{ $access_link }}" >
                            <img    class="card-img-top w-100"
                                    src="{{ $cover }}"
                                    alt="Card image cap" >
                        </a>
                    </div>
                    <div    class="align-self-end"
                            style="position:absolute">

                            <a href="{{ $play_link }}">
                                <i  class="far fa-play-circle m-3 play_button"></i>
                            </a>
                    </div>
                </div>

                <div    class="card-footer">
                    <span   class="card-text d-block">{{ $title }}</span>
                    <small  class="text-muted d-block">{{ $description }}</small>
                </div>
            </div>
        @endforeach
    </div>
</div>
