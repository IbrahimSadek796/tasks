<?php
/***
  You are on a boat trip with 10 people.
  You ask the group how many people know how to swim.
  Some people answer "Yes", some people answer "No", and some people do not answer at all.
  The data is represented in the following array:

  You need to purchase life jackets and want to know how many you need in the following scenarios:
  
  1- If you buy life jackets for only the people who answered "No".
  2- If you buy life jackets for the people who answered "No" and the people who did not answer.
***/
$votes =   [
  'Adam' => 'Yes',
  'Bob' => Null,
  'Charlie' => 'Yes',
  'David' => 'No',
  'Emily' => Null,
  'Frank' => 'Yes',
  'Grace' => 'No',
  'Hannah' => Null,
  'Isabel' => 'No',
  'Jack' => 'Yes'
  ];

// Print number for first scenario
// var_dump($votes);
foreach ($votes as $vote => $value) {
  if ($value == 'No') {
    echo $vote . ' = ' . $value . '<br>';
  }
}
echo "<hr>";
// Print number for second scenario

foreach ($votes as $vote => $value) {
  if ($value == 'No') {
    echo $vote . ' = ' . $value . '<br>';
  }
  
  if ($value == NULL) {
    # code...
    echo $vote . ' = Null'. '<br>';
  }
}
echo "<hr>";

?>