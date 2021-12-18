
<?php
$arPermission = Session::get('arPermission');
$count = 0;
?>
@foreach($arPermission as $arraycolumn => $arrayrow)
    <li>
        <?php if ($count == 9||$count ==8)
                $string= "admin/$arrayrow[0]";
              else
                $string= "pages/$arrayrow[0]";
        ?>
        <a href="{{URL::to($string)}}">
            <i class="{{$arrayrow[2]}}"></i>
            <span>{{$arrayrow[1]}}</span>
        </a>
    </li>
    <?php $count = $count + 1 ;?>
@endforeach
