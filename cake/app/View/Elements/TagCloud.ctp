<div class="tagcloud">
<?php
foreach ($tags_incl as $cltag):
?>
<span class="tagbox">
<?php
$ratio=count($cltag['Tagged']);
if ($ratio>0)
{
if ($ratio<4) $ratio=1;
elseif  ($ratio<8) $ratio=2;
elseif ($ratio <12) $ratio=3;
elseif ($ratio<20) $ratio=4;

echo $this->Html->link($cltag['Tag']['name'],array('action'=>'index','0',$cltag['Tag']['id']),
		array('class'=>'tagel'.$ratio));
} 
?>
</span>
<?php endforeach;?>
</div>   
