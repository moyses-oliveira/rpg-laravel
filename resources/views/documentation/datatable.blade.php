<?php
/**
 * @var array $header
 * @var array $data
 */
?>
<table class="table table-striped table-hover">
    <thead>
    <tr>
    @foreach ($header as $th)
        <th scope="col">{!! $th !!}</th>
    @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($data as $row)
        <tr>
            @foreach($row as $i => $valor)
                @if ($i === 0)
                    <th scope="row">{!! $valor !!}</th>
                @else
                    <td>{!!  $valor !!}</td>
                @endif
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
