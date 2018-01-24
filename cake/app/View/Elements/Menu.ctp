<?php 
echo "<ul id=\"menu\">";
echo "<li class=\"menuitem\">".$this->Html->link('Все мнения', array('controller' => 'Opinions','action'=>'index'))."</li>";
echo "<li class=\"menuitem\">".$this->Html->link('Фильмы', array('controller' => 'Opinions','action'=>'index','1'))."</li>";
echo "<li class=\"menuitem\">".$this->Html->link('Композиции', array('controller' => 'Opinions','action'=>'index','5'))."</li>";
echo "<li class=\"menuitem\">".$this->Html->link('Альбомы', array('controller' => 'Opinions','action'=>'index','6'))."</li>";
echo "<li class=\"menuitem\">".$this->Html->link('Книги', array('controller' => 'Opinions','action'=>'index','2'))."</li>";
echo "</ul>";
?>