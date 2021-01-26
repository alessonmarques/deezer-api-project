<?php
    use app\Support\Track;

    // $list_position  = 0;
    $title_tag      = ucwords(implode(' ', explode('_', $type)));
?>

<div class="table-responsive">
    <table class="table table-dark table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr class="col-12">
                <th class="col-1">#</th>

                <th class="col-6">Faixa</th>
                <th class="col-2">Artista</th>
                <th class="col-2">Álbum</th>
                <th class="col-1">D.</th>
            </tr>
        </thead>

        <h4>{{ $title_tag  }}</h4>
        <hr>
        <tbody>
            @forelse ($itens as $item)
                <?php

                    $deezerObject       = new \stdClass();

                    switch($item->type)
                    {
                        case 'track':
                            $deezerObject = new Track();
                        break;

                        default:
                            dd($item);
                        break;
                    }

                    $listObjectData    = $deezerObject->getListData($item);

                ?>
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <a href="{{ $listObjectData->play_link }}" class="text-decoration-none text-white text-weight-bold">
                            {{ $listObjectData->title }}
                        </a>
                    </td>
                    <td>{{ $listObjectData->arist }}</td>
                    <td>{{ $listObjectData->album }}</td>
                    <td>{{ $listObjectData->duration }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No registers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


@section('header-private')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
@endsection

@section('footer-private')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script>
        $('#dataTable').DataTable({
            paging: false,
            "columnDefs": [
                { "orderable": true, "targets": [0] },
            ]
        });
    </script>
@endsection
