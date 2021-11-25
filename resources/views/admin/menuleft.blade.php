
<?php
$arPermission = Session::get('arPermission');
?>
@foreach($arPermission as $arraycolumn => $arrayrow)
    <li>
        <?php if (count($arPermission) == 2)
                $string= "admin/$arrayrow[0]";
              else
                $string= "pages/$arrayrow[0]";
        ?>
        <a href="{{URL::to($string)}}">
            <i class="{{$arrayrow[2]}}"></i>
            <span>{{$arrayrow[1]}}</span>
        </a>
    </li>
@endforeach
