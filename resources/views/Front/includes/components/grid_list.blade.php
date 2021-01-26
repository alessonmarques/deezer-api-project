<?php
    use app\Support\Album;
    use app\Support\Artist;
    use app\Support\Playlist;
    use app\Support\Radio;
    use app\Support\Track;
    use app\Support\Podcast;

    $title_tag = ucwords(implode(' ', explode('_', $type)));
?>

<div    class="row py-2 px-2 d-block"
        style="overflow: hidden;">
    <h4 class="font-weight-bold">{{ $title_tag }}</h4>
    <hr>
    <div    id="card_n#"
            class="card-deck card-list-itens"
            style="width: 162vw" >

        @forelse ($itens as $item)
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
                    case 'podcast':
                        $deezerObject = new Podcast();
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

            <div    class="card bg-dark my-2"
                    style="min-width: 280px; width: 280px; max-width: 280px" >
                <div class="d-flex" >
                    <div class="card-img-top" >
                        <a href="{{ $access_link }}" >
                            <img    class="card-img-top w-100 p-1 {{ 'card_img_'.$item->type }}"
                                    src="{{ $cover }}"
                                    alt="Card image cap" >
                        </a>
                    </div>
                    <div    class="card_btn {{ 'card_btn_'.$item->type }}"
                            style="position:absolute">

                            <a href="{{ $play_link }}">
                                <i  class="far fa-play-circle m-3 play_button"></i>
                            </a>
                    </div>
                </div>

                <div    class="card-footer {{ 'card_text_'.$item->type }}">
                    <span   class="card-text d-block">{{ $title }}</span>
                    <small  class="text-muted d-block">{{ $description }}</small>
                </div>
            </div>
        @empty
            <div>
                <h5 class="m-2">No registers found.</h5>
            </div>
        @endforelse
    </div>
</div>
