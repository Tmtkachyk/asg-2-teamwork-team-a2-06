<?php
function validTitleQuery()
{

  return queryHasOneKey() && titleQueryExists() && titleIsString()
    && titleIsValidString();
}

function titleQueryExists()
{
  return array_key_exists("title", $_GET);
}

function queryHasOneKey()
{
  return count($_GET) == 1;
}

function titleIsString()
{
  $titleQuery = $_GET["title"];
  return is_string($titleQuery);
}

function titleIsValidString()
{
  $titleQuery = $_GET["title"];
  if ($titleQuery == "") {
    return false;
  } else {
    return true;
  }
}

// function containsOnlyOneQuery()
// {
//   $pattern = "/&*/";

//   $titleQuery = $_GET["title"];
//   if (preg_match($pattern, $titleQuery, $matches)) {
//     var_dump($matches);
//     return false;
//   } else
//     return true;
// }



// ?title=alien&title=alien
// ?title=alien&title=alien&title=alien
